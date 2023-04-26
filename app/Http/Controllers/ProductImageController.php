<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductImageResource;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->response('all product images' , ProductImageResource::collection(ProductImage::all()));
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
        $productimage = new ProductImage();   
        $filename = time()."_".$req->file('image1')->getClientOriginalName();
        $req->file('image1')->move(public_path('image'),$filename);
        $productimage->image1 = $filename;
        $productimage->product_id = $req->product_id;
        $productimage->save();

        if($req->file('image2')){
            $filename = time()."_".$req->file('image2')->getClientOriginalName();
            $req->file('image2')->move(public_path('image'),$filename);
            $productimage->image2 = $filename;
            $productimage->save();
        }
        if($req->file('image3')){
            $filename = time()."_".$req->file('image3')->getClientOriginalName();
            $req->file('image3')->move(public_path('image'),$filename);
            $productimage->image3 = $filename;
            $productimage->save();
        }
        if($req->file('image4')){
            $filename = time()."_".$req->file('image4')->getClientOriginalName();
            $req->file('image4')->move(public_path('image'),$filename);
            $productimage->image4 = $filename;
            $productimage->save();
        }
        return $this->response('all images' , new ProductImageResource($productimage));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($productimage)
    {
        $productimage = ProductImage::where('id' , $productimage)->first();
        return $this->response('all categories' , new ProductImageResource($productimage));
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
    public function update(Request $request, $productimage)
    {
        $productimage = ProductImage::where('id' , $productimage)->first();
        $filename = time()."_".$request->file('image1')->getClientOriginalName();
        $request->file('image1')->move(public_path('image'),$filename);
        $productimage->image1 = $filename;
        $productimage->product_id = $request->product_id;
        $productimage->update();

        if($request->file('image2')){
            $filename = time()."_".$request->file('image2')->getClientOriginalName();
            $request->file('image2')->move(public_path('image'),$filename);
            $productimage->image2 = $filename;
            $productimage->update();
        }
        if($request->file('image3')){
            $filename = time()."_".$request->file('image3')->getClientOriginalName();
            $request->file('image3')->move(public_path('image'),$filename);
            $productimage->image3 = $filename;
            $productimage->update();
        }
        if($request->file('image4')){
            $filename = time()."_".$request->file('image4')->getClientOriginalName();
            $request->file('image4')->move(public_path('image'),$filename);
            $productimage->image4 = $filename;
            $productimage->update();
        }
        return $this->response('all images' , new ProductImageResource($productimage));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productimage = ProductImage::where('id' , $id)->first();
        if ($productimage->image1) {
            $image =$productimage->image1;
            $imagepath = public_path('image/'.$image);
            unlink($imagepath);
        }
    
        if ($productimage->image2) {
            $image =$productimage->image2;
            $imagepath = public_path('image/'.$image);
            unlink($imagepath);
        }
    
        if ($productimage->image3) {
            $image =$productimage->image3;
            $imagepath = public_path('image/'.$image);
            unlink($imagepath);
        }
    
        if ($productimage->image4) {
            $image =$productimage->image4;
            $imagepath = public_path('image/'.$image);
            unlink($imagepath);
        }
            $productimage->delete();
            return response()->json([
                'condition'=> true,
                'message' => "Delete!",
            ],200);
    }
}
