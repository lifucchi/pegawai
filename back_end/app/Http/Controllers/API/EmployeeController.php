<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\JsonResponse;

class EmployeeController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employees = Employee::all();
        return $this->sendResponse(EmployeeResource::collection($employees), 'employee retrieved successfully.');

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

        // Validate the incoming request data
        $validator = Validator::make($input, [
            'nip' => 'required|string|max:255|unique:employees,nip',
            'nama' => 'required|string|max:255',
            'tempatlahir' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tanggallahir' => 'required|date',
            'kelamin' => 'required|string|in:L,P', // Assuming L for male and P for female
            'npwp' => 'nullable|string|max:255',
            'nohp' => 'required|string|max:15',
            'unitkerja' => 'required|string|max:255',
            'tempattugas' => 'required|string|max:255',
            'namajabatan' => 'required|string|max:255',
            'foto' => 'nullable|string|max:255',
            'echelon_id' => 'nullable|exists:echelons,id', // Assuming echelon is a related model
            'group_id' => 'nullable|exists:groups,id', // Assuming group is a related model
        ]);

        if($validator->fails()){
            return response()->json(['error' => 'Validation Error.', 'messages' => $validator->errors()], 422);       
        }

        // Create a new employee using the validated data
        $employee = Employee::create($validator->validated());

        // Return a JSON response with the created employee resource
        // return response()->json(new EmployeeResource($employee), 201);
        return $this->sendResponse(new EmployeeResource($employee), 'Employee created successfully.');
        
    }
    // public function store(Request $request): JsonResponse
    // {
    //     $validatedData = $request->validate([
    //         'nip' => 'required|string|max:255|unique:employees,nip',
    //         'nama' => 'required|string|max:255',
    //         'tempat_lahir' => 'required|string|max:255',
    //         'alamat' => 'required|string|max:255',
    //         'tanggal_lahir' => 'required|date',
    //         'kelamin' => 'required|string|in:L,P',
    //         'npwp' => 'nullable|string|max:255',
    //         'nohp' => 'required|string|max:15',
    //         'unit_kerja' => 'required|string|max:255',
    //         'tempat_tugas' => 'required|string|max:255',
    //         'nama_jabatan' => 'required|string|max:255',
    //         'foto' => 'nullable|string|max:255',
    //         'echelon_id' => 'nullable|exists:echelons,id', 
    //         'group_id' => 'nullable|exists:groups,id', 
    //     ]);
    //     error_log("halo");


    //     if($validator->fails()){
    //         return $this->sendError('Validation Error.', $validator->errors());       
    //     }


    //     $employee = Employee::create($validatedData);

    //     return $this->sendResponse(new EmployeeResource($eselon), 'Employee created successfully.');

    //     // return response()->json(new EmployeeResource($employee), 201);

    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
