<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $validate =  $request->validate(
            ['comment_text' => 'required',]
        );

        Comment::create(
            [
                'comment_text' => $validate['comment_text'],
                'blog_id' => $id
            ],
            [
                'comment_text.required' => 'Commentar tidak boleh kosong',
            ]
        );

        return redirect()->route('detail-blog', ['id' => $id])->with('message', 'commentar berhasil di masukkan');
    }
}
