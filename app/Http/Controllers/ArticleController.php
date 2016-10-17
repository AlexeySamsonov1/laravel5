<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware[] = [
            'middleware' => 'auth',
            'options' => [
                'except' => 'index'
            ],
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest('published_at')->isPublished()->get();

        return view('articles/index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::pluck('name', 'id');
        return view('articles/create', ['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->createArticle($request);
        //$tagIds = $request->input('tag_list');
        //$article->getTags()->attach($tagIds);

        //session()->flash('flash_message', 'The article has been created!');
        flash()->success('The article has been created!');

        return redirect('articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('articles/show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $tags = Tag::pluck('name', 'id');
        return view('articles/edit', ['article' => $article, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ArticleRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());
        // Sync up pivot table in a database.
        $this->syncTags($article, $request->input('tag_list'));

        return redirect('articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Sync up the list of tags in the database.
     *
     * @param Article $article
     * @param array $tags
     */
    private function syncTags(Article $article, array $tags)
    {
        $article->getTags()->sync($tags);
    }

    /**
     * Save an article.
     *
     * @param Request $request
     * @return Article $article
     */
    private function createArticle(Request $request)
    {
        $article = \Auth::user()->getArticles()->create($request->all());
        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }
}
