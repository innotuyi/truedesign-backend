<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    


    public function printing() {

        $response = DB::select(' SELECT  a.id, a.name as product_name, a.description, a.photo1, a.photo2, a.categoryID, b.name as Category_name FROM  Product AS a 
         JOIN Category AS b  
         ON  b.id = a.categoryID
         WHERE b.name = ?           
         ', ['Printing']);

         return response()->json($response);
    }

    public function designing() {

        $response = DB::select(' SELECT  a.id, a.name as product_name, a.description, a.photo1, a.photo2, a.categoryID, b.name as Category_name FROM  Product AS a 
         JOIN Category AS b  
         ON  b.id = a.categoryID
         WHERE b.name = ?           
         ', ['Designing']);

         return response()->json($response);
    }
    public function branding() {

        $response = DB::select(' SELECT  a.id, a.name as product_name, a.description, a.photo1, a.photo2, a.categoryID, b.name as Category_name FROM  Product AS a 
         JOIN Category AS b  
         ON  b.id = a.categoryID
         WHERE b.name = ?           
         ', ['Branding']);

         return response()->json($response);
    }


}
