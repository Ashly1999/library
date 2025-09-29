<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded=[];
    protected $primaryKey='book_id';
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    // One book can have many users
    public function user()
    {
        return $this->hasMany(User::class, 'book_id', 'book_id'); // book.book_id → user.book_id
    }
    
}
