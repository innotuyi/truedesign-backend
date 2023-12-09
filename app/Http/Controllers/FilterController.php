<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    


    public function printing() {

        $response = DB::select(' SELECT * FROM  Product AS a 
         JOIN Category AS b  
         ON  b.id = a.categoryID
         WHERE b.name = ?           
         ', ['Printing']);

         return response()->json($response);
    }
}
