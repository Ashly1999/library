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
       
            $categories = Category::all();
      
       
        return view('book.create',compact('categories'));
    }

    public function bookstore(Request $request)
    {
        Book::create([
            'title'            => $request->input('bname'),
            'author'           => $request->input('author'),
            'category_id'      => $request->input('category_id'),
            'publisher'        => $request->input('publisher'),
            'year_publisher'   => $request->input('year'),
            'edition'          => $request->input('edition'),
            'langauge'         => $request->input('lan'), // Fixed typo
            'available_copies' => $request->input('copy'),
            'price'            => $request->input('price'),
            'status'           => $request->input('status'),
        ]);
       
        $books = Book::with('category')->get();
        
        return view('book.details', compact('books'));
    }

    public function view()
    {
        $books = Book::with('category')->get();
        return view('book.details', compact('books'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $books = Book::with('category')
            ->when($search,function ($query, $search) 
        {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
         })->get();

        return view('book.details', compact('books','search'));
    }
    
    public function edit($id)
    {
            $book = Book::with('category')->findOrFail($id); 
            $categories = Category::all();
            return view('book.edit', compact('book', 'categories'));
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
            'langauge' => $request->input('lan'), // fixed typo
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

    public function logout(Request $request)
    {
        Auth::logout(); // remove user session

        // invalidate and regenerate token for security
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logged out successfully!');
    }
    
}
