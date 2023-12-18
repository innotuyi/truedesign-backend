<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    

    public function createContact(Request $request) {
        try {
            // Validate the incoming request data
            $validator = $this->validate($request, [
                'name' => 'required|string',
                'email' => 'required|email',
                'subject' => 'required|string',
                'message' => 'required|string',
            ]);

            // Validation passed, create a new contact record in the database
            $contact = Contact::create($validator);

            // You can return a response or redirect as needed
            return response()->json(['message' => 'Contact created successfully', 'contact' => $contact]);
        } catch (ValidationException    $e) {
            return response()->json(['error' => $e->errors()], 400);
        }
      
    }


    public function contacts() {


        $response = Contact::all();

        return response()->json($response);

    }
}
