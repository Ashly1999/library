<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded=[];
    protected $primaryKey='book_id';
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
