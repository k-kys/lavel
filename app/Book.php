<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // protected $table = 'sachs'; nếu tên Bảng khác với tên Model
    public function author()
    {
        return $this->belongsTo('App\Author', 'author_id');
    }

    public function categories()
    {
        // return $this->belongsToMany('App\Category', 'book_category', 'book_id', 'category_id');
        return $this->belongsToMany('App\Category'); // nếu đặt chuẩn theo laravel rồi
    }
}
