<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Unit;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use GuzzleHttp\Handler\Proxy;

class ProductContoller extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->response('all products' , ProductResource::collection(Product::all()));
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
    
        $product = new Product();
        $product->name = $req->name;
        $product->price = $req->price;
        $product->discount = $req->discount;
        $product->category_id = $req->category_id;
        $product->tag_id = $req->tag_id;
        $product->unit_id = $req->unit_id;
        $product->save();
        return $this->response('All Products' , new ProductResource($product));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {
        $product = Product::where('id' , $product)->first();
        return $this->response('all Products' , new ProductResource($product));
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
    public function update(Request $req, $product)
    {
        $product = Product::where('id' , $product)->first();
        $product->name = $req->name;
        $product->price = $req->price;
        $product->discount = $req->discount;
        $product->category_id = $req->category_id;
        $product->tag_id = $req->tag_id;
        $product->unit_id = $req->unit_id;
        $product->update();
        return $this->response('All Products' , new ProductResource($product));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $product = Product::where('id' , $product)->first();
        $product->delete();
        return response()->json([
            'condition'=> true,
            'message' => "Delete!",
        ],200);
    }
}
