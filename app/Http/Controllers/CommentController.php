<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    public function __construct()
    {
/*        $this->middleware[] = [
            'middleware' => 'auth',
            'options' => [
                'only' => ['create', 'edit']
            ],
        ];*/
    }

    public function create(Article $article)
    {
        return view('comment.create', ['article' => $article]);
    }

    public function edit(Comment $comment)
    {
        return view('comment/edit', ['comment' => $comment]);
    }

    /**
     * @param Request $request
     * @param Article $article
     */
    public function store(Request $request, Article $article)
    {
        $this->validate($request, [
           'body' => 'required|min:3'
        ]);
        //$article->getComments()->create(['body' => $request->body, 'user_id' => Auth::user()->id]);
        //\Auth::user()->getComments()->create($request->all());
/*        $comment = new Comment([
            'body' => $request->body,
            'user_id' => Auth::user()->id,
            'article_id' => $article->id
        ]);
        $comment->save();*/
        $comment = new Comment([
            'body' => $request->body,
            'article_id' => $article->id
        ]);
        Auth::user()->getComments()->save($comment);
        //$article->addComment($comment);

        return back();
    }

    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());
        $article = $comment->getArticle;

        return redirect(route('articles.show', ['article' => $article]));
    }
}
