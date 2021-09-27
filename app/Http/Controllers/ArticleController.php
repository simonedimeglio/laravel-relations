<?php

namespace App\Http\Controllers;
use App\Article;
use App\Author;
use App\Tag;
use Illuminate\Http\Request;
use Psy\TabCompletion\AutoCompleter;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $tags = Tag::all();
        return view('articles.create', compact('authors', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | string',
            'img' => 'url',
            'paragraph' => 'required | string',
            'date' => 'required | date',
        ]);

        $article = new Article();
        $this->saveItemFromRequest($article, $request);
        return redirect()->route('articles.show', $article);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article, Tag $tag, Author $author)
    {
        // dd($article);
        $tags = Tag::all();
        $authors = Author::all();
        return view('articles.edit', compact('article', 'tags', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'string',
            'img' => 'url',
            'paragraph' => 'string',
            'date' => 'date',
        ]);

        // $data = $request->all();
        // $post->update($data);
        $this->saveItemFromRequest($article, $request);
        return redirect()->route('article.show', $article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->tag()->detach();
        $article->delete();
        return redirect()->route('articles.index');
    }

    private function saveItemFromRequest(Article $article, Request $request) {

        $data = $request->all(); // data = array

        $article->title = $data['title'];
        $article->img = $data['img'];
        $article->paragraph = $data['paragraph'];
        $article->date = $data['date'];
        $article->author_id = $data['author_id'];
        $article->save();

        $article->tag()->sync($data['tags']);

     
    }
}
