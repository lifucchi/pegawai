<?php
namespace App\Http\Controllers\API;
       
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Religion;
use Validator;
use App\Http\Resources\ReligionResource;
use Illuminate\Http\JsonResponse;

       
class ReligionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $religions = Religion::all();
        
        return $this->sendResponse(ReligionResource::collection($religions), 'religions retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();
       
        $validator = Validator::make($input, [
            'name' => 'required'
        ]);
       
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
       
        $religion = Religion::create($input);
       
        return $this->sendResponse(new ReligionResource($religion), 'Religion created successfully.');
    } 
     
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        $religion = Religion::find($id);
      
        if (is_null($religion)) {
            return $this->sendError('Religion not found.');
        }
       
        return $this->sendResponse(new ReligionResource($religion), 'Religion retrieved successfully.');
    }
      
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Religion $religion): JsonResponse
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required'
        ]);
       
        if($validator->fails()){
            // return $this->sendError('Validation Error.',  $request->all());       
            return $this->sendError('Validation Error.', $validator->errors());       
        }
       
        $religion->name = $input['name'];
        $religion->save();
       
        return $this->sendResponse(new ReligionResource($religion), 'Religion updated successfully.');
    }
     
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Religion $religion): JsonResponse
    {
        $religion->delete();
       
        return $this->sendResponse([], 'Religion deleted successfully.');
    }
}