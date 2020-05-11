<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function books()
    {
        return $this->belongsToMany('App\Category', 'book_category', 'category_id', 'book_id');
    }
}
