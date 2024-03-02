<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Admin\AdminRouteController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){



        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            // $token = $user->createToken('authToken')->plainTextToken;

            // session()->put('token', $token);
        
            $roles = $user->getRoleNames();

            if($roles[0] == "Super_Admin"){
                return redirect()->route('SuperAdmin.Home');
            }elseif($roles[0] == "Hotel_Admin"){
                return redirect()->route('HotelAdmin.Home');
            }
            elseif($roles[0] == "Hotel_Casher"){
                return redirect()->route('HotelCasher.Home');
            }

        } else {
            return back()->with('error','Invalid Email or Password');
        }
        
    }
}
