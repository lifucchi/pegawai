<?php
     
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Http\Resources\GroupResource;
use Illuminate\Http\JsonResponse;


class GroupController extends BaseController
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {


        $groups = Group::with('echelons')->get();
        return response()->json(GroupResource::collection($groups));

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

        $validator = Validator::make($input, [
            'golongan' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $group = Group::create($input);


        return $this->sendResponse(new GroupResource($group), 'Group created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) : JsonResponse
    {

        $group = Group::find($id);

        if (is_null($group)) {
            return $this->sendError('group not found.');
        }
       
        return $this->sendResponse(new GroupResource($group), 'group retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group): JsonResponse
    {
        //

        $group->delete();
    
        return $this->sendResponse([], 'group deleted successfully.');
    }
    
}
