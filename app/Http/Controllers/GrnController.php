<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grn;
use App\Models\Item;

class GrnController extends Controller
{
    // Show GRN entry form
    public function create()
    {
        $materials=Item::all();
       
        return view('grn.create',compact('materials'));
    }

    // Store GRN data
    public function store(Request $request)
    {
        $request->validate([
            'material_name' => 'required|string',
            'batch_number' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'supplier' => 'required|string',
            'manufacture_date' => 'required|date',
            'expiry_date' => 'required|date|after_or_equal:manufacture_date',
        ]);

        // Generate document number (e.g., GRN20250922-001)
        $lastGrn = Grn::latest()->first();
        $nextId = $lastGrn ? $lastGrn->id + 1 : 1;
        $documentNo = 'GRN' . date('Ymd') . '-' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
        $materialCode = $request->material_name;
        
        $count = Grn::table('grns')
            ->where('material_code', $materialCode)
            ->whereDate('created_at', Carbon::today())
            ->count();

        $sequence = str_pad($count + 1, 2, '0', STR_PAD_LEFT); // e.g., '01'

        // 5. Combine to make batch number
        $batchNumber = $materialCode . '-' . $date . '-' . $sequence;
        // Save GRN
        $grn = new Grn();
        $grn->material_name = $materialCode;
        $grn->batch_number = $batchNumber;
        $grn->quantity = $request->quantity;
        $grn->supplier = $request->supplier;
        $grn->manufacture_date = $request->manufacture_date;
        $grn->expiry_date = $request->expiry_date;
        $grn->save();
        return redirect()->back()->with('success', "GRN saved successfully! Document No: $documentNo");
    }
}
