<?php

namespace App\Http\Controllers\route;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Hotel;
use App\Models\Menu;
use Illuminate\Http\Request;

class PublicRouteController extends Controller
{
    public function login()
    {
        return view("login");
    }
    public function getHotel($name)
    {
        $hotel = Hotel::where('hotel_name', $name)->first();

        if ($hotel) {
            $categories = Category::where('hotel_id', $hotel['id'])->get();

            // Fetching menus grouped by category
            $menusByCategory = [];
            foreach ($categories as $category) {
                $menusByCategory[$category->name] = Menu::where('hotel_id', $hotel->id)
                    ->where('menu_available', '1')
                    ->where('category_id', $category->id)
                    ->get();
            }

            return view('HotelDetails', compact('hotel', 'categories', 'menusByCategory'));
        } else {
            // User not found, redirect to login route
            return redirect()->route('login');
        }
    }
}
