<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Models\Hotel;

class HotelController extends Controller
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
    public function store(StoreHotelRequest $request)
    {
        $data = $request->validated();

        $filename = 'hotel_' . time() . '_' . uniqid() . '.' . $request->file('hotel_image_path')->getClientOriginalExtension();

        $imagePath = $request->file('hotel_image_path')->move(public_path('images/hotels'), $filename);

        $hotelID = substr(uniqid() . mt_rand(), 0, 10);

        $hotel = Hotel::create([
            'hotel_name' => $data['hotel_name'],
            'hotel_email' => $data['hotel_email'],
            'hotel_image_path' => '/images/hotels/' . $filename, // Adjust the image path
            'hotel_id' => $hotelID,
            'hotel_address' => $data['hotel_address'],
            'hotel_mobile' => $data['hotel_mobile'],
        ]);

        return redirect()->route("SuperAdmin.Hotels")->with("success", "Hotel Registered");
    }

    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHotelRequest $request, Hotel $hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        //
    }
}
