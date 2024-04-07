<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Menu;

class MenuController extends Controller
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
    public function store(StoreMenuRequest $request)
    {
        $validatedData = $request->validated();

        // dd($validatedData);
        $filename = 'menu' . time() . '_' . uniqid() . '.' . $request->file('menu_image')->getClientOriginalExtension();

        $imagePath = $request->file('menu_image')->move(public_path('images/menus'), $filename);

        $user = auth()->user();

        $menu = Menu::create([
            "hotel_id" => $user->hotel_id,
            "menu_name" => $validatedData['menu_name'],
            "category_id" => $validatedData['category_id'],
            "menu_price" => $validatedData['menu_price'],
            "menu_image_path" => '/images/menus/' . $filename,
            "menu_description" => $validatedData['menu_description'],
        ]);

        return redirect()->route("HotelAdmin.Menus")->with("success", "Menu Added");
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
