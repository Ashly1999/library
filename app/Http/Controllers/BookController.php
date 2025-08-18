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
       
       Book::create([
            'title'=>request('bname'),
            'author' => request('author'),
            'category_id' => request('category_id'),
            'publisher' => request('bname'),
            'year_publisher' => request('year'),
            'edition' => request('edition'),
            'langauge' => request('lan'),
            'available_copies' => request('copy'),
            'price' => request('price'),
            'status' => request('status'),
        ]);

        $books = Book::with('category')->get();

        return view('book.details', compact('books'));
    }

    public function view()
    {
        $books = Book::with('category')->get();
        return view('book.details', compact('books'));
    }
}
