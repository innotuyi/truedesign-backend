<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts() {

        return 'all products';

   }

   public function singleProduct($id) {
       return 'single product';


   }

   public function createProduct(Request $request)
   {

       return 'product created';

   }

   public function updateCategory($id) {

       return 'product updated successful';
   }
}
