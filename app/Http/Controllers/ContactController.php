<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $message = $request->all();
        // Validar datos

        Mail::to('luisprmat@gmail.com')->send(new MessageReceived($message));

        return response()->json([
            'status' => 'OK',
        ]);
    }
}
