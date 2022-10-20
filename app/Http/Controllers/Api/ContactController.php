<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use App\Mail\SandNewMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request){

        $dati = $request->all();

        $newContant = new Contact();
        $newContant->fill($dati);
        $newContant->save();

        Mail::to('matteo2784@gmail.com')->send(new SandNewMail($newContant));

        return response()->json([
            'status' => true
        ]);
    }
}
