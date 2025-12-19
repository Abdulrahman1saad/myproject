<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function validatePost() {
        return request()->validate([
            'title' => ['required', 'unique:posts', 'max:50'],
            'body' => 'required',
            'author' => 'required'
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('articles.index', [
            'articles' => Article::cursorPaginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validatePost();
        
        Article::create([
            'title' => request('title'),
            'body' => request('body'),
            'author' => request('author')    
        ]);

        return redirect('/articles');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {

        $comments = $article->comments()->where('approved', 1)->get();
    
    
        return view('articles.show', compact('article', 'comments'));
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Article $article)
    {
        $this->validatePost();

        $article->update([
            'title' => request('title'),
            'body' => request('body'),
            'author' => request('author')   
        ]);

        return redirect('/articles/' . $article->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
