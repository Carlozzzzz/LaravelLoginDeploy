<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{
    public function index() {
        if(View::exists("auth.index")) {
            return view("auth.index");
        } else {
            return abort(404);
        }
    }

    // Comment
    public function process(Request $request) {

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        dd($validated);
    }
}
