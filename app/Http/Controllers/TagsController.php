<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag = null)
    {
        $posts = $tag->blogs;
        return view('index', compact('posts'));

    }
}