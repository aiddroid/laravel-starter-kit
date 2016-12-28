<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * User of comment
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Comment of article
     */
    public function article()
    {
        return $this->belongsTo(Article::class, 'parent_id', 'id');
    }
}
