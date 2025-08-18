<?php

namespace App\Http\Controllers;
Use App\Models\Book;
Use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create()
    {
        $categories=Category::all();
        return view('book.create',compact('categories'));
    }

    public function bookstore()
    {
        $book=Book::create([
            'title'=>request('bname'),
            'author' => request('author'),
            'category_id' => request('category_id'),
            'title' => request('bname'),
            'title' => request('bname'),
            'title' => request('bname'),
            'title' => request('bname'),
            'title' => request('bname'),
            'title' => request('bname'),
            'title' => request('bname'),
        ]);
    }
}
