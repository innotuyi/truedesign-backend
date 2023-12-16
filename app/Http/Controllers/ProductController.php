<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function getProducts() {

        $response = Product::orderBy('created_at', 'desc')->get();

        return response()->json($response);


   }

   public function singleProduct($id) {
    
    
    $response = Product::find($id);

    if (!$response) {

       return response()->json(['message' => 'Inspection not found'], 404);

   
    }
    return response()->json($response);

   }

   public function createProduct(Request $request)
   {
    try {

        $rules = [
            'name' => 'required|string|max:255',
            'categoryID'=> 'required|integer|max:255',
            'description' => 'required|string|max:255',
            'photo1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'photo2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
        

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $paths = [];

            for ($i = 1; $i <= 3; $i++) {
                $file = $request->file('photo' . $i);

                if ($file) {
                    $originalName = $file->getClientOriginalName();
                    $path = $file->storeAs('public', $originalName);
                    $paths[] = $path;
                }
            }

        $category = Product::create([
            'name'=>$request->name,
            'categoryID'=>$request->categoryID,
            'description'=>$request->description,
            'photo1' => $request->file('photo1')->getClientOriginalName(),
            'photo2' => $request->file('photo2')->getClientOriginalName(),
            'photo3' => $request->file('photo3')->getClientOriginalName(),


        ]);
        return response()->json(['message' => 'category created successfully', 'data' => $category], 201);
    } catch (\Exception $e) {
        return response()->json(['message' => 'An error occurred while creating the product', 'error' => $e->getMessage()], 500);
    }

    


   }

   public function updateCategory(Request $request,$id) {

    try {
        $category = Product::find($id);

        if (!$category) {
            return response()->json(['message' => 'category not found'], 404);
        }

        $data = $request->all(); // Corrected line
        $category->update($data);
        return response()->json(['message' => 'category updated successfully', 'data' => $category], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'An error occurred while updating the cooperative', 'error' => $e->getMessage()], 500);
    }
   }
}
