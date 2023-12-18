<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    

    public function allContact(){

        $contacts = Contact::count();

        return response()->json($contacts);
    }

    public function allProducts() {

        $allProducts = Product::count();

        return response()->json($allProducts);
    }
}
