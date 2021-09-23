@extends('layouts.app')

@section('title', 'ARTICLES')

@section('content')
    <div class="article-list-container">
        <h2>Here is the list of articles you can read</h2>
        @foreach ($articles as $article)
            <div class="article-title">
                <a href={{ route('articles.show', $article) }}>
                    <div>{{ $article->title }}</div>
                </a>
            </div>

        @endforeach

    </div>

@endsection
