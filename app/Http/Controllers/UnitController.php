<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Resources\UnitResource;

class UnitController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->response('All Unit' , UnitResource::collection(Unit::all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $unit = new Unit();
        $unit->name = $req->name;
        $unit->save();
        return $this->response('All Units' , new UnitResource($unit));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($unit)
    {
        $unit = Unit::where('id' , $unit)->first();
        return $this->response('Tag' , new UnitResource($unit));
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
    public function update(Request $req, $unit)
    {
        $unit = Unit::where('id' , $unit)->first();
        $unit->name = $req->name;
        $unit->save();
        return $this->response('Update Category!' , new UnitResource($unit));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($unit)
    {
        $unit = Unit::where('id' , $unit)->first();
        $unit->delete();
        return response()->json([
            'condition'=> true,
            'message' => "Delete!",
        ],200);
    }
}
