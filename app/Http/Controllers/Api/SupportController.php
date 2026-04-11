<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MassageSupport;

class SupportController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|max:255',
            'hp' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);
        return response()->json(['message' => 'Support request received successfully.'], 200);

        // Here you can handle the support request, e.g., save it to the database or send an email
        $support = new MassageSupport();
        $support->email = $request->email;
        $support->hp = $request->hp;
        $support->message = $request->message;
        $support->save();

        return response()->json(['message' => 'Support request received successfully.'], 200);
    }
}
