<?php

namespace App\Http\Controllers;

use App\Mail\DueDateMail;
use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use App\Mail\StatusMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

use function Ramsey\Uuid\v1;

class RegisterController extends Controller
{
    //

    public function indexes()
    {
        return view('layout');
    }
    public function index()
    {
        $books = Book::all();
        return view('register',compact('books'));
    }

    public function store(Request $request)
    {

        $data = [
            'name'          => request('name'),
            'email'         => request('email'),
            'password' => bcrypt(request('password')),
            'role'          => request('role'),
            'membership_no' => request('membership_no'),
            'address'       => request('address'),
            'book_id'       => request('book_id'),
            'status'        => request('status'),
            'join_date'     => request('jdate'),
            'issue_date'    => request('idate'),
            'due_date'      => request('ddate'),
        ];
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('asset/uploads'), $filename);
            $data['image'] = $filename;
        }



        $users = User::with('book')->get();
        $user = User::create($data);

       
        return redirect()->route('login');
    }

    public function create()
    {
        return view('login');
    }

    public function loginstore(Request $request)
    {
       
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate(); 
            return redirect()->route('details'); 
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->onlyInput('email');
    }
    public function view()
    {
        if (Auth::check() && Auth::user()->role == 1) {
            $user = User::with('book')->get();
        } else {
            $user = User::with('book')->where('user_id', Auth::id())->get();
        }
        $books = Book::all();

        return view('details', compact('user', 'books'));
    }



    public function edit($userid)
    {
        $user = User::with('book')->findOrFail($userid);
        $books = Book::all();
        //   $user=User::find($userid);
          return view('edit',compact('user','books'));
    }

    public function update($userid)
    {
        $user=User::find($userid);

        $oldStatus = $user->status;

        $tomorrow = Carbon::tomorrow()->format('Y-m-d');

        // Get users whose due_date is tomorrow
        $users = User::whereDate('due_date', $tomorrow)->get();
        
        // $beforeDate = date('d-m-Y', strtotime($duedate . ' -1 day'));
        $user->update([
            'name'          => request('name'),
            'email'         => request('email'),
            'password' => bcrypt(request('password')),
            'role'          => request('role'),
            'membership_no' => request('membership_no'),
            'address'       => request('address'),
            'book_id'       => request('book_id'),
            'status'        => request('status'),
            'join_date'     => request('jdate'),
            'issue_date'    => request('idate'),
            'due_date'      => request('ddate'),
        ]);
       

        if ($oldStatus != 1 && $user->status == 1) {
           
            Mail::to($user->email)->send(new StatusMail($user, $user->status));
        }
        if ($user->due_date) {
            $dueDate = Carbon::parse($user->due_date);
            $beforeDate = Carbon::tomorrow();
            $dayBeforeDue = $dueDate->copy()->subDay();
            if ($dueDate->isSameDay($beforeDate)) {
                Mail::to($user->email)->send(new DueDateMail($user, $user->due_date));
            }
        }

        return redirect()->route('details')
            ->with('success', 'Status updated & emails sent if applicable!');
    }

    
    
    // public function drop($userid)
    // {
    //    $user=User::find($userid);
    //    $user->delete();
    //    return redirect()->route('details');
    // }

    public function catcreate()
    {
        if (Auth::user()->role == 1) 
        {
             return view('category.create');
        } else {
            $cat = Category::all();
            return view('category.view', compact('cat'));
        }
    }
    


    public function catstore()
    {
         $category=Category::create([

            'name'=>request('cname'),
            'description' => request('des'),
            'status' => request('status'),
         ]);

        return redirect()->route('catview');
    }

    public function catview()
    {
        $cat=Category::all();
        return view('category.view',compact('cat'));
    }

    public function catedit($id)
    {
        $cat = Category::find($id); 
         return view('category.edit',compact('cat'));
        
    }

    public function catupdate(Request $request,$id)
    {
        $cat=Category::find($id);
        $cat->update([
            'name' => $request->cname,
            'description' => $request->des,
            'status' => $request->status,
        ]);
        return redirect()->route('catview');
    }

    public function catdelete($id)
    {
      $cat=Category::find($id);
        $cat->delete();
        return redirect()->route('catview');
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



 
