<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use App\Mail\SandNewMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request){

        $dati = $request->all();
        
        $validator = Validator::make($dati, [
            'name' => 'required',
            'email' => 'required|email',
            'content' => 'required',
        ]);

        if ($validator->fails()) {    
            return response()->json([
                'status' => false,
                'error' => $validator->errors()
            ]);
        }


        $newContant = new Contact();
        $newContant->fill($dati);
        $newContant->save();

        Mail::to('matteo2784@gmail.com')->send(new SandNewMail($newContant));

        return response()->json([
            'status' => true
        ]);
    }
}
