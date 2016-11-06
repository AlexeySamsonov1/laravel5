<?php

use App\Article;
use App\Comment;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a superuser.
        $this->call(UsersTableSeeder::class);
        // Create 5 tags.
        $this->call(TagsTableSeeder::class);
        // Populate 'articles', 'users', 'article_tag' tables.
        factory(User::class, 3)->create()->each(function ($u) {
            factory(Article::class, 5)->create([
                'user_id' => $u->id,
            ])->each(function ($article) {
                $tags = (Tag::all()->pluck('id')->toArray());
                $article->getTags()->attach($tags);
            });
        });
        // Create 3 comments per article.
        $this->call(CommentsTableSeeder::class);
    }
}
