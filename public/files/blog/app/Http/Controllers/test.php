<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index() {
        return view('articles.index', [
            'articles' => Article::cursorPaginate(10)
        ]);
    }

    public function create() {
        return view('articles.create');
    }

    public function store() {
        
    }
}
