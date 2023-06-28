<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TranslationController extends Controller
{
    public function index(){
        return view('home');
    }

    public function checkHonorific(Request $request){
        $text = $request->input('text');
        $before = $text;
        $text = Str::lower($text);
        
        $from = $request->input('from');
        $to = $request->input('to');
        
        $loma = DB::table('sundanese')->pluck('loma')->all();
        $sorangan = DB::table('sundanese')->pluck('sorangan')->all();
        $batur = DB::table('sundanese')->pluck('batur')->all();
        
        if($from != $to && !($from == 'indonesia' || $to == 'indonesia')){
            $text = Str::replace($$from, $$to, $text);
            $text = Str::ucfirst($text);
        }
        else if(($from == 'indonesia' || $to == 'indonesia') && $from != $to)
        {
            if($from == 'sorangan' || $from == 'batur'){
                $text = Str::replace($$from, $loma, $text);
            }
            
            $text = $this->translate($text, $from, $to);
        }

        return response()->json([
            'from' => $from,
            'to' => $to,
            'before' => $before,
            'after' => $text
        ]);
    }

    public function translate($value, $from, $to){

        if($from == 'loma' || $from == 'sorangan' || $from == 'batur')
        {
            $fr = 'su';
        }
        else
        {
            $fr = 'id';
        }
        
        if($to == 'loma' || $to == 'sorangan' || $to == 'batur')
        {
            $t = 'su';
        }
        else
        {
            $t = 'id';
        }

        $tr = new GoogleTranslate();
        $tr->setSource($fr);
        $tr->setTarget($t);
        $text = $tr->translate($value);
        $text = Str::ucfirst($text);
        
        return $text;
    }
}