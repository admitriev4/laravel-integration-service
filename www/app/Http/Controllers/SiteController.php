<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{

    public function index() {
        return view('index');
    }

    public function register(Request $request) {

        if($request->input('password') == $request->input('repeat-password')) {
            $user = User::create([
                'email'    => $request->input('email'),
                'name'     => $request->input('name'),
                'password' => bcrypt($request->input('password'))
            ]);

            var_dump($user->email);
            var_dump($user->password);
        }
    }

}
