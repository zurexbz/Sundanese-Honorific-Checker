<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(){
        return view('reportpage');
    }

    public function report(Request $request){
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:36',
            'contact' => 'required',
            'text' => 'required|min:8|max:256'
        ]);

        DB::table('reports')->insert($validatedData);

        return redirect()->intended('/report')->with('success', 'Report has been submitted');
    }
}