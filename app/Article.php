<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    //fillable fields
    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'excerpt', 'icon_image', 'content', 'status'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

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
}
