<?php

use App\Article;
use App\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if( ! Auth::user() ) {
            Auth::loginUsingId(1);
        }
        $articles = Article::all();
        foreach ($articles as $article) {
            $comments = factory(Comment::class, 3)->make([
                'article_id' => $article->id
            ]);
            foreach ($comments as $comment) {
                Auth::user()->getComments()->save($comment);
            }
        }
    }
}
