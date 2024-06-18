<?php
     
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Echelon;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Http\Resources\EchelonResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;


class EchelonController extends BaseController
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        // $echalon = Echelon::all();
  
        // dd($groups);
        
        // return $this->sendResponse(EchelonResource::collection($echalon), 'echalon retrieved successfully.');
        // return EchelonResource::collection(Echelon::with('groups')->get());
        $echelons = Echelon::with('groups')->get();
        return response()->json(EchelonResource::collection($echelons));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();
        error_log(print_r($input, true));

        $validator = Validator::make($input, [
            'eselon' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $eselon = Echelon::create($input);

        return $this->sendResponse(new EchelonResource($eselon), 'Echelon created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) : JsonResponse
    {
        // error_log($eselon);

        $eselon = Echelon::find($id);
        error_log($eselon);

        if (is_null($eselon)) {
            return $this->sendError('eselon not found.');
        }
       
        return $this->sendResponse(new EchelonResource($eselon), 'echelon retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id) :JsonResponse
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Echelon $echelon): JsonResponse 
    {
        //
        $input = $request->all();
        // error_log($input);
        error_log($echelon);

        $echelon->eselon = $input['eselon'];
        $echelon->save();
       
        return $this->sendResponse(new EchelonResource($echelon), 'Echalon updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Echelon $echelon): JsonResponse
    {
        //
        Log::info($echelon);
        error_log($echelon);

        $echelon->delete();
       
        return $this->sendResponse([], 'echalon deleted successfully.');
    }
}