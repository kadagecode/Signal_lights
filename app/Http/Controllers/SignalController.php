<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signal;

class SignalController extends Controller
{
    //


    //View all signalls 
    public function index()
{

    $signals=Signal::all();

    return view('index' , compact('signals'));
}



// store the signal data
public function store(Request $request)
    {
        $validated = $request->validate([
            'sequence_a' => 'required|integer|min:1|max:4',
            'sequence_b' => 'required|integer|min:1|max:4',
            'sequence_c' => 'required|integer|min:1|max:4',
            'sequence_d' => 'required|integer|min:1|max:4',
            'green_interval' => 'required|integer|min:1',
            'yellow_interval' => 'required|integer|min:1',
        ]);

       

       
            Signal::updateOrCreate(
                [
                    'sequence_a' => $request->sequence_a,
                    'sequence_b' => $request->sequence_b,
                    'sequence_c' => $request->sequence_c,
                    'sequence_d' => $request->sequence_d,
                    'green_interval' => $request->green_interval,
                    'yellow_interval' => $request->yellow_interval
                ]
            );
        
            $signals = [
                ['name' => 'A', 'sequence' => $validated['sequence_a'], 'green_interval' => $validated['green_interval'], 'yellow_interval' => $validated['yellow_interval']],
                ['name' => 'B', 'sequence' => $validated['sequence_b'], 'green_interval' => $validated['green_interval'], 'yellow_interval' => $validated['yellow_interval']],
                ['name' => 'C', 'sequence' => $validated['sequence_c'], 'green_interval' => $validated['green_interval'], 'yellow_interval' => $validated['yellow_interval']],
                ['name' => 'D', 'sequence' => $validated['sequence_d'], 'green_interval' => $validated['green_interval'], 'yellow_interval' => $validated['yellow_interval']],
            ];

            return response()->json(['success' => 'Signals updated successfully', 'signals' => $signals]);
    }

   
}