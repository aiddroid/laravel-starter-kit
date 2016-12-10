<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleCategory extends Model
{
    use SoftDeletes;

    //fillable fields
    protected $fillable = ['label', 'slug', 'order'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * drop list items form html form
     * @return array
     */
    public static function dropListItems()
    {
        $articleCategories = ArticleCategory::withTrashed()->get(['id', 'label'])->toArray();

        $dropListItems = [];
        foreach ($articleCategories as $articleCategory) {
            $dropListItems[$articleCategory['id']] = $articleCategory['label'];
        }

        return $dropListItems;
    }
}
