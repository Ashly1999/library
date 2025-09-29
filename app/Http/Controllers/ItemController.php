<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return view('item.create');
    }

    public function store(Request $request)
    {
        $item=Item::create([
            'item_name' => $request->name,
            'item_code' => $request->code,
        ]);
     
        session()->flash('success', 'Item saved successfully!');

        return redirect()->route('item.create');
    }
        
    
}
