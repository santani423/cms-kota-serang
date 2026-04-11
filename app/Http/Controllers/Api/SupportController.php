<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'hp' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // Here you can handle the support request, e.g., save it to the database or send an email
        $support = new \App\Models\MassageSupport();
        $support->email = $request->email;
        $support->hp = $request->hp;
        $support->message = $request->message;
        $support->save();

        return response()->json(['message' => 'Support request received successfully.'], 200);
    }
}
