@extends('layouts.app')

@section('title', 'NEW')

@section('content')
    <div class="article-create-container">
        <h2>SHOOT ALL THE WORDS YOU HAVE IN MIND</h2>

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

        <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            {{-- ARTICLE CONTENT --}}

            <label for="name">TITLE</label>
            <input type="text" name="title" id="title" placeholder="Article Title">

            <label for="name">PICTURE</label>
            <input type="file" name="img" id="img" placeholder="Picture File">

            <label for="name">WORDS</label>
            <input type="text" name="paragraph" id="paragraph" placeholder="Text">

            <label for="name">DATE</label>
            <input type="date" name="date" id="date">

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
