<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'article';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['published_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'title',
    	'body',
    	'published',
        'published_at'
    ];

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    public function scopeIsPublished($query)
    {
        $query->where('published', '>', 0)->where('published_at', '<=', Carbon::now());
    }

    /**
     * An article is owned by a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getUser()
    {
        return $this->belongsTo('\App\User');
    }

    /**
     * Give the tags associated with given article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getTags()
    {
        return $this->belongsToMany('\App\Tag');
    }

    /**
     * Get a list of tags ids associated with the current article.
     *
     * @return array
     */
    public function getTagListAttribute()
    {
        //dd($this->getTags->pluck('id')->all());
        //return $this->getTags->lists('id')->all();
        return $this->getTags->pluck('id')->toArray();
    }
}
