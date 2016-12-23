<?php

namespace App;

use App\Traits\SearchableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes, SearchableTrait;

    //fillable fields
    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'excerpt', 'icon_image', 'content', 'status'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    //searchable fields
    protected $searchable = [
        'id' => ['='],
        'user_id' => ['='],
        'category_id' => ['='],
        'title' => ['LIKE', '%{title}%'],
        'slug' => ['LIKE', '%{slug}%'],
        'excerpt' => ['LIKE', '%{excerpt}%'],
        'content' => ['LIKE', '%{content}%'],
        'status' => ['=']
    ];

    /**
     * author of article
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function author()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * category of article
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne(ArticleCategory::class, 'id', 'category_id');
    }

//    /**
//     * @param $query
//     * @param array $attributes
//     * @return mixed
//     */
//    public function scopeSearch(Builder $query, $attributes = [])
//    {
//        isset($attributes['id']) && $query->where('id', $attributes['id']);
//        isset($attributes['category_id']) && $query->where('category_id', $attributes['category_id']);
//        isset($attributes['user_id']) && $query->where('user_id', $attributes['user_id']);
//        isset($attributes['title']) && $query->where('title', 'LIKE', "%{$attributes['title']}%");
//        isset($attributes['slug']) && $query->where('slug', 'LIKE', "%{$attributes['slug']}%");
//        isset($attributes['excerpt']) && $query->where('excerpt', 'LIKE', "%{$attributes['excerpt']}%");
//        isset($attributes['content']) && $query->where('content', 'LIKE', "%{$attributes['content']}%");
//        isset($attributes['status']) && $query->where('status', $attributes['status']);
//
//        return $query;
//    }
}
