<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\Comment;

class CommentRepository extends EloquentRepository
{
    public function getModel()
    {
        return Comment::class;
    }

    public function find($id) {
        $comment = Comment::where('id_news', $id)->with('users')->orderBy('id', 'desc')->get();
        return $comment;
    }

}
?>
