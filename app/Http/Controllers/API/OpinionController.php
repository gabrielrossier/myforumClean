<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResourceCollection;
use App\Http\Resources\OpinionResource;
use App\Http\Resources\OpinionResourceCollection;
use App\Models\Opinion;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new OpinionResourceCollection(Opinion::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new OpinionResource(Opinion::find($id));
    }

    /**
     * Returns the comments made on the given opinion
     * @param $id
     * @return CommentResourceCollection
     */
    public function comments($id)
    {
        foreach (Opinion::find($id)->comments as $comment) {
            $res[] = [
                'by' => $comment->pseudo,
                'text' => $comment->pivot->comment,
                'points' => $comment->pivot->points
            ];
        }
        return new CommentResourceCollection($res);
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
    public function destroy($id)
    {
        //
    }
}
