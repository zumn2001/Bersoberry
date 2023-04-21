<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Resources\TagResource;

class TagController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->response('All Tags' , TagResource::collection(Tag::all()));
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
        $tag = new Tag();
        $tag->name = $req->name;
        $tag->save();
        return $this->response('All Tags' , new TagResource($tag));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tag)
    {
        $tag = Tag::where('id' , $tag)->first();
        return $this->response('Tag' , new TagResource($tag));
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
    public function update(Request $req, $tag)
    {
        $tag = Tag::where('id' , $tag)->first();
        $tag->name = $req->name;
        $tag->save();
        return $this->response('Update Category!' , new TagResource($tag));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tag)
    {
        $tag = Tag::where('id' , $tag)->first();
        $tag->delete();
        return response()->json([
            'condition'=> true,
            'message' => "Delete!",
        ],200);

    }
}
