<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * User has many articles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getArticles()
    {
        return $this->hasMany('App\Article');
    }

    /**
     * User has many comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * This method is used for \App\Http\Middleware\RedirectIfAManager
     *
     * @return bool
     */
    public function isAManager()
    {
        return false;
    }
}
