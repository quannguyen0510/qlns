<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Repositories\CommentRepository;

class CommentController extends Controller
{

    protected $CommentRepository;

    public function __construct(CommentRepository $CommentRepository)
    {
        $this->CommentRepository = $CommentRepository;
    }

    public function index()
    {

    }

    public function show($id)
    {
        return $this->CommentRepository->find($id);
    }

    public function update(Request $request, $id)
    {

    }

    public function store(Request $request)
    {
        $comment = $request->all();
        $comment['created_at'] = Carbon::now();
        $comment = Comment::create($comment);
        return response()->json($comment);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return $comment;
    }
}
