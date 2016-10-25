<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {
        $articles = $tag->getArticles()->isPublished()->get();

        return view('articles/index', ['articles' => $articles]);
    }
}
