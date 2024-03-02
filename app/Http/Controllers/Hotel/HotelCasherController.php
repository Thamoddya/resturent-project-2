<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Table;
use Illuminate\Http\Request;

class HotelCasherController extends Controller
{
    public function CasherHome(){


        $user = auth()->user();
        $hotelMenus = Menu::where('hotel_id',$user->hotel_id)->get();
        $tables = Table::where('hotel_id',$user->hotel_id)
        ->where('isActive',1)
        ->where('isReserved',0)
        ->get();

        $allTables = Table::where('hotel_id',$user->hotel_id)
        ->where('isActive',1)
        ->get();

        return view("Hotel.Cachear",compact([
            "user",
            'hotelMenus',
            'tables',
            'allTables'
        ]));
    }
}
