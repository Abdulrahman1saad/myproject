<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(StoreComment $request ,Article $article) {
        Comment::create([
            'name' => request('name'),
            'body' => request('body'),
            'article_id' => $article->id
        ]);

        return back();
    }
}
