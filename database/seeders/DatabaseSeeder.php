<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('public')->get('json/sundanese.json');
        $array = json_decode($json);
        foreach($array as $obj){
            DB::table('sundanese')->insert([
                'loma' => $obj->loma,
                'sorangan' => $obj->sorangan,
                'batur' => $obj->batur,
            ]);
        }
    }
}