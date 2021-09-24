@extends('layouts.app')

@section('title', 'EDIT')

@section('content')
    <div class="article-edit-container">
        <h2>EDIT LIKE A CRAFTSMAN</h2>

        {{-- ERRORS ALERT SYSTEM --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('articles.store') }}" method="post">
            @csrf

            {{-- ARTICLE CONTENT --}}

            <label for="name">TITLE</label>
            <input type="text" name="title" id="title" placeholder="{{ $article->title}}">

            <label for="name">PICTURE</label>
            <input type="text" name="img" id="img" placeholder="{{ $article->img}}">

            <label for="name">WORDS</label>
            <input type="text" name="paragraph" id="paragraph" placeholder="{{ $article->paragraph}}">

            <label for="name">DATE</label>
            <input type="date" name="date" id="date" placeholder="{{ $article->date }}">

            <select class="custom-select" id="author_id" name="author_id">
                <option value="" disabled selected>Who is writing? Select the signature!</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>

            <div class="tags-checkbox">
                <div class="tags-checkbox-title">
                    <i class="fas fa-tag"></i>
                    <h5>TAGS</h5>
                </div>

                <div class="tag-line">
                    @foreach ($tags as $tag)
                    <div class="tag-check">
                        <input name="tags[]" type="checkbox" value="{{ $tag->id }}">
                        <label>{{ $tag->tag_name }}</label>
                    </div>
                @endforeach
                </div>
            </div>

            <input class="submit-button" type="submit" value="Submit">


    </div>

@endsection
