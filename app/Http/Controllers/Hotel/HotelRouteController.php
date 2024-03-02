<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Menu;
use App\Models\Table;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HotelRouteController extends Controller
{

    public function HotelAdminHome()
    {
        $user = self::HotelAdminData();

        $hotelData = HotelData::getUserHotelData($user);
        $employeesCount = HotelData::getHotelEmployeeCount($user);
        $transactionCount = HotelData::getHotelTransactionsCount($user);
        $totalPrice = HotelData::getHotelIncomeTotal($user);
        $tables = HotelData::getTables($user);
        $transactions = HotelData::getLast10Transactions($user);

        return view("Hotel.HotelAdminHome", compact([
            "user",
            "hotelData",
            "employeesCount",
            "transactionCount",
            "totalPrice",
            "tables",
            "transactions"
        ]));
    }

    public function HotelAdminUsers()
    {
        $user = self::HotelAdminData();

        $usersExceptLoggedInUsers = HotelData::getHotelEmployeeData($user);
        return view("Hotel.HotelAdminUsers", compact([
            'usersExceptLoggedInUsers',
            'user'
        ]));
    }

    public function HotelAdminMenus()
    {
        $user = self::HotelAdminData();


        $menus = HotelData::getHotelMenus($user);
        return view("Hotel.HotelAdminMenues", compact([
            'user',
            'menus'
        ]));
    }

    public static function HotelAdminData()
    {
        return auth()->user();
    }
}


class HotelData
{
    public static function getUserHotelData($userData)
    {
        $data = Hotel::where('id', $userData->hotel_id)->first();
        return $data;
    }

    public static function getHotelEmployeeCount($userData)
    {

        $roles = Role::whereIn('name', ['Hotel_Employee', 'Hotel_Casher'])->pluck('id');

        $employeesCount = User::where('hotel_id', $userData->hotel_id)
            ->whereHas('roles', function ($query) use ($roles) {
                $query->whereIn('role_id', $roles);
            })
            ->count();

        return $employeesCount;
    }

    public static function getHotelTransactionsCount($userData)
    {
        $transactions = Transaction::where('hotel_id', $userData->hotel_id)->get();

        return $transactions->count();
    }

    public static function getHotelIncomeTotal($userData)
    {
        $transactions = Transaction::where('hotel_id', $userData->hotel_id)->get();


        return $transactions->sum('total_price');
    }

    public static function getTables($userData)
    {
        $tables = Table::where('hotel_id', $userData->hotel_id)->get();

        return $tables;
    }

    public static function getLast10Transactions($userData)
    {
        $data = Transaction::where('hotel_id', $userData->hotel_id)
            ->latest()
            ->take(10)
            ->get();

        return $data;
    }
    public static function getHotelEmployeeData($userData)
    {
        $roles = Role::whereIn('name', ['Hotel_Employee', 'Hotel_Casher'])->pluck('id');

        $employeesCount = User::where('hotel_id', $userData->hotel_id)
            ->where('id', '!=', $userData->id)
            ->whereHas('roles', function ($query) use ($roles) {
                $query->whereIn('role_id', $roles);
            })
            ->get();


        return $employeesCount;
    }

    public static function getHotelMenus($userData){
        $menus = Menu::where('hotel_id',$userData->hotel_id)->get();
        return $menus;
    }
}
