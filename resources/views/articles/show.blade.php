@extends('layouts.app')

@section('title', 'READING')

@section('content')
    <div class="article-show-container">
        <div class="upper-line">
            <div class="upper-action">
                <a href="{{ route('articles.edit', $article) }}"><i class="fas fa-signature"></i> EDIT</a>
            </div>

            <h2>{{ $article->title }}</h2>

            <form class="upper-action" action="{{ route('articles.destroy', $article) }}" method="POST">
                @csrf
                @method('DELETE')
                <span>KILL <button type="subimt" class="destroy"><i class="fas fa-skull-crossbones"></i></button></span>
            </form>
        </div>
    
        <div class="sign"><i>{{ $author->name }}</i></div>
        <div class="article-content">
            <div class="article-paragraph">
                {{ $article->paragraph }}
            </div>
            <div class="article-img">
                <img src="{{ $article->img }}" alt="{{ $article->img }}'s picture">
            </div>
        </div>
        
        <h6>{{ $article->date }}</h6>

    </div>
@endsection
