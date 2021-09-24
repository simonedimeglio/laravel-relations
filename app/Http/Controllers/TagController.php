<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function list(Tag $tag) {
        return view('tag.show_articles', compact('tag'));
    }
}