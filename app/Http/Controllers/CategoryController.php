<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{



    public function getCategories() {

         return 'all categories';

    }

    public function singleCategory($id) {
        return 'single category';


    }

    public function createCategory(Request $request)
    {

        return 'ressource created';

    }

    public function updateCategory() {

        return 'resources updated successful';
    }
    


}
