<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductDescriptionResource;
use App\Models\ProductDescription;
use Illuminate\Http\Request;

class ProductDescriptionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->response('all Descriptions' , ProductDescriptionResource::collection(ProductDescription::all()));
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
        $product_description = new ProductDescription();
        $product_description->description = $req->description;
        $product_description->product_id = $req->product_id;
        $product_description->save();
        return $this->response('all descriptons' , new ProductDescriptionResource($product_description));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_description)
    {
        $product_description = ProductDescription::where('id' , $product_description)->first();
        return $this->response('all Descriptions' , new ProductDescriptionResource($product_description));
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
    public function update(Request $req, $product_description)
    {
        $product_description = ProductDescription::where('id' , $product_description)->first();
        $product_description->description = $req->description;
        $product_description->product_id = $req->product_id;
        $product_description->update();
        return $this->response('Update Description!' , new ProductDescriptionResource($product_description));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_description)
    {
        $product_description = ProductDescription::where('id' , $product_description)->first();
        $product_description->delete();
        return response()->json([
            'condition'=> true,
            'message' => "Delete!",
        ],200);
    }
}
