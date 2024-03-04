<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StoreUserRequest2;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $userData = $request->validated();

        $user = new User([
            'name' => $userData['name'],
            'hotel_id' => $userData['hotel_id'],
            'email' => $userData['email'],
            'password' => Hash::make($userData['password']), // It's a good practice to hash passwords
            'mobile' => $userData['mobile'],
            'nic' => $userData['nic'],
            'address' => $userData['address'],
        ]);
        $user->save();

        $user->assignRole('Hotel_Admin');
        return redirect()->route('SuperAdmin.Users')->with('success', 'User created successfully.');
    }

    public function storeEmployee(StoreUserRequest2 $request)
    {
        $userData = $request->validated();

        $user = auth()->user();
        $user = new User([
            'name' => $userData['name'],
            'hotel_id' => $user->hotel_id,
            'email' => $userData['email'],
            'password' => Hash::make($userData['password']),
            'mobile' => $userData['mobile'],
            'nic' => $userData['nic'],
            'address' => $userData['address'],
        ]);
        $user->save();

        if ($userData['role_id'] == '3') {
            $user->assignRole('Hotel_Employee');
        } else {
            $user->assignRole('Hotel_Casher');
        }

        return redirect()->route('HotelAdmin.users')->with('success', 'Employee Added successfully.');
    }

    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function Orders(){
        $user = auth()->user();
        $orders =  Order::with('orderdMenus')
        ->where('hotel_id', $user->hotel_id)
        ->where('isPaid', '0')
        ->latest()
        ->take(25)
        ->get();

        $PaidOrders=  Order::with('orderdMenus')
        ->where('hotel_id', $user->hotel_id)
        ->where('isPaid', '1')
        ->latest()
        ->take(25)
        ->get();

        return view('Hotel.Orders',compact('user','orders','PaidOrders'));

    }

    public function OrderPage($id){


        $orderData = Order::where('order_id', $id)->first();

        $orderdFoods = $orderData->orderdMenus;

        return view('Hotel.OrderPage',compact([
            'orderData',
            'orderdFoods',
        ]));
    }
}
