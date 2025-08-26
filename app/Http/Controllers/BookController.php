<?php

namespace App\Http\Controllers;
Use App\Models\Book;
Use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
            'title'            => request('bname'),
            'author'           => request('author'),
            'category_id'      => request('category_id'), // must come from your form
            'publisher'        => request('publisher'),   // FIXED
            'year_publisher'   => request('year'),
            'edition'          => request('edition'),
            'langauge'         => request('lan'),
            'available_copies' => request('copy'),
            'price'            => request('price'),
            'status'           => request('status'),
        ]);
        $books = Book::with('category')->get();
        return view('book.details', compact('books'));
    }


    public function view()
    {
        $books = Book::with('category')->get();
        return view('book.details', compact('books'));
    }
    public function edit($id)
    {
        if (Auth::check() && Auth::user()->Role == 1) {
            $book = Book::findOrFail($id);
            $categories = Category::all();
            return view('book.edit', compact('book', 'categories'));
        } else {
            abort(403, 'Admin only permission');
        }
    }

    // Update book
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $book->update([
            'title' => $request->input('bname'),
            'author' => $request->input('author'),
            'category_id' => $request->input('category_id'),
            'publisher' => $request->input('publisher'),
            'year_publisher' => $request->input('year'),
            'edition' => $request->input('edition'),
            'language' => $request->input('lan'), // fixed typo
            'available_copies' => $request->input('copy'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('view')->with('success', 'Book updated successfully!');
    }

    public function delete($id)
    {
        $book = Book::find($id);

        $book->delete();

        return redirect()->route('view')
            ->with('success', 'Book deleted successfully!');
    }
}
