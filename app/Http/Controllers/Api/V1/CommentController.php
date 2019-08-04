<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class CommentController extends Controller
{
    public function index()
    {

    }

    public function show($id)
    {
        $comment = Comment::where('id_news', $id)->with('users')->get();
        return response()->json($comment);
    }

    public function update(Request $request, $id)
    {

    }

    public function store(Request $request)
    {
        $comment = $request->all();
        $comment['created_at'] = Carbon::now();
        Comment::create($comment);
        return response()->json(['message'=>'Comment success']);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return $comment;
    }
}
