<?php

namespace App\Http\Controllers\route;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicRouteController extends Controller
{
    public function login(){
        return view("login");
    }
}
