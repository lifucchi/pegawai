<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;


class EmployeeController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page'); 
        
        $employees = Employee::with(['echelon', 'group', 'religion'])->get();
        return response()->json([
            'data' => EmployeeResource::collection($employees),
            // 'meta' => [
            //     'current_page' => $employees->currentPage(),
            //     'last_page' => $employees->lastPage(),
            //     'per_page' => $employees->perPage(),
            //     'total' => $employees->total()
            // ]
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'nip' => 'required|string|max:255|unique:employees,nip',
            'nama' => 'required|string|max:255',
            'tempatlahir' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tanggallahir' => 'required|date',
            'kelamin' => 'required|string|in:L,P', 
            'npwp' => 'nullable|string|max:255',
            'nohp' => 'required|string|max:15',
            'unitkerja' => 'required|string|max:255',
            'tempattugas' => 'required|string|max:255',
            'namajabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif', 
            'echelon_id' => 'nullable|exists:echelons,id', 
            'group_id' => 'nullable|exists:groups,id',
            'religion_id' => 'nullable|exists:religions,id', 
        ]);

        if($validator->fails()){
            return response()->json(['error' => 'Validation Error.', 'messages' => $validator->errors()], 422);       
        }

        $validatedData = $validator->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filePath = $file->store('pictures', 'public');
            $validatedData['foto'] = $filePath;
        }

        // Create a new employee using the validated data
        $employee = Employee::create($validatedData);

        return $this->sendResponse(new EmployeeResource($employee), 'Employee created successfully.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id) : JsonResponse
    {

        $employee = Employee::with(['echelon', 'group', 'religion'])->find($id);

        if (is_null($employee)) {
            return $this->sendError('employee not found.');
        }
       
        return $this->sendResponse(new EmployeeResource($employee), 'echelon retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'nip' => 'nullable|string|max:255|unique:employees,nip',
            'nama' => 'nullable|string|max:255',
            'tempatlahir' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'tanggallahir' => 'nullable|date',
            'kelamin' => 'nullable|string|in:L,P', 
            'npwp' => 'nullable|string|max:255',
            'nohp' => 'nullable|string|max:15',
            'unitkerja' => 'nullable|string|max:255',
            'tempattugas' => 'nullable|string|max:255',
            'namajabatan' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif', 
            'echelon_id' => 'nullable|exists:echelons,id', 
            'group_id' => 'nullable|exists:groups,id', 
            'religion_id' => 'nullable|exists:religions,id', 
        ]);


        if($validator->fails()){
            return response()->json(['error' => 'Validation Error.', 'messages' => $validator->errors()], 422);       
        }
        $validatedData = $validator->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filePath = $file->store('pictures', 'public');
            $validatedData['foto'] = $filePath;
        }
       

        $employee->update($validatedData);

        return $this->sendResponse(new EmployeeResource($employee), 'Employee updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee): JsonResponse
    {
        //
        $employee->delete();
    
        return $this->sendResponse([], 'Employee deleted successfully.');
    }
}
