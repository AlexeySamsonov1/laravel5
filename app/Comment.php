<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'article_comment';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the articles, associated with the given comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getArticle()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    /**
     * An comment is owned by a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getUser()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }
}
