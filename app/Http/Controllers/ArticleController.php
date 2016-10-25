<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
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
                'except' => ['index', 'show']
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
        //dd($articles);
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
        //session()->flash('flash_message', 'The article has been created!');
        flash()->success('The article has been created!');

        return redirect('articles');
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Article $article)
    {
        // Eager Loading.
        $article->load('getComments', 'getTags');
        // the same is
        //$article = Article::with('getComments', 'getTags')->findOrFail($article->id);
            //return ($article->getComments);
        //$comments = $article->getComments;
        return view('articles/show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Article $article)
    {
        //$article = Article::findOrFail($id);
        $tags = Tag::pluck('name', 'id');
        return view('articles/edit', ['article' => $article, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ArticleRequest|Request $request
     * @param Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        //$article = Article::findOrFail($id);dd($article);
        $article->update($request->all());
        // Sync up pivot table in a database.
        $article->getTags()->sync($request->input('tag_list'));

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
     * Save an article.
     *
     * @param Request $request
     * @return Article $article
     */
    private function createArticle(Request $request)
    {
        $article = \Auth::user()->getArticles()->create($request->all());
        $article->getTags()->attach($request->input('tag_list'));

        return $article;
    }

}
