<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Table;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminRouteController extends Controller
{

    public function AdminHome()
    {

        $user = auth::user();
        return view('Admin.Pages.AdminHome', compact('user'));
    }

    public function AdminUsers()
    {
        $user = auth::user();

        $usersExceptLoggedInUsers = User::with('hotels') // Eager load the hotels relationship
            ->where('id', '!=', $user->id)
            ->get();

        $hotels = Hotel::whereDoesntHave('user')
            ->get();
        return view('Admin.Pages.AdminUsers', compact('user', 'hotels', 'usersExceptLoggedInUsers'));
    }

    public function AdminHotels()
    {
        $user = auth::user();
        $hotels = Hotel::with('user')->get();
        return view('Admin.Pages.AdminHotels', compact('user', 'hotels'));
    }

    public function AdminHotelDetails($id)
    {
        $user = auth::user();

        $hotelData = Hotel::where('hotel_id', $id)->first();
        if ($hotelData === null) {
            return redirect()->route('SuperAdmin.Hotels'); // Redirect to the AdminHotels route
        } else {
            // Get the roles 'Hotel_Employee' and 'Hotel_Casher'
            $roles = Role::whereIn('name', ['Hotel_Employee', 'Hotel_Casher'])->pluck('id');

            // Count the employees with the specified roles related to the hotel
            $employeesCount = User::where('hotel_id', $hotelData->id)
                ->whereHas('roles', function ($query) use ($roles) {
                    $query->whereIn('role_id', $roles);
                })
                ->count();

            $transactions = Transaction::where('hotel_id', $hotelData->id)->get();

            // Calculate the total count of transactions
            $transactionCount = $transactions->count();

            // Calculate the total price of all transactions
            $totalPrice = $transactions->sum('total_price');

            $tables = Table::where('hotel_id', $hotelData->id)->get();
            return view('Admin.Pages.AdminHotelData', compact([
                'user',
                'hotelData',
                'roles',
                'employeesCount',
                'transactionCount',
                'totalPrice',
                'tables'
            ]));
        }
    }
}
