<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('register');
    }

    public function store()
    {
        $data = [
            'name'          => request('name'),
            'email'         => request('email'),
            'password' => bcrypt(request('password')),
            'role'          => request('role'),
            'membership_no' => request('membership_no'),
            'address'       => request('address'),
            'status'        => request('status'),
            'join_date'     => request('jdate'),
            'issue_date'    => request('idate'),
            'due_date'      => request('ddate'),
        ];

        if (request()->hasFile('image')) {
            $data['image'] = request()->file('image')->store('uploads', 'public');
        }

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
          
            $user = User::all();
        } else {
            
            $user = collect([Auth::user()]); 
        }

        return view('details', compact('user'));
    }

    public function edit($userid)
    {
          $user=User::find($userid);
          return view('edit',compact('user'));
    }

    public function update($userid)
    {
        $user=User::find($userid);
        $user->update([
            'name'          => request('name'),
            'email'         => request('email'),
            'password' => bcrypt(request('password')),
            'role'          => request('role'),
            'membership_no' => request('membership_no'),
            'address'       => request('address'),
            'status'        => request('status'),
            'join_date'     => request('jdate'),
            'issue_date'    => request('idate'),
            'due_date'      => request('ddate'),
        ]);

        return redirect()->route('details');
    }

    // public function drop($userid)
    // {
    //    $user=User::find($userid);
    //    $user->delete();
    //    return redirect()->route('details');
    // }

    public function catcreate()
    {
        if (Auth::user()->role == 1) {
            // return view('category.create');
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
}

 
