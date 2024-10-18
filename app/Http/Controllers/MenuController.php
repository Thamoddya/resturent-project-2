<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Menu;
use App\Models\MenuType;
use Illuminate\Http\Request;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getMenu()
    {
        $user = auth()->user();
        $hotelID = $user->hotel_id;

        $menus = Menu::where('hotel_id', $hotelID)->get();
        return response()->json($menus);
    }

    public function setMenuAvailable($id)
    {
        $menu = Menu::find($id);

        if ($menu) {
            if ($menu->menu_available == 1) {
                $menu->menu_available = 0;
            } else {
                $menu->menu_available = 1;
            }
            $menu->save();
            return redirect()->back()->with("success", "Menu availability updated");
        } else {
            return response()->json(['error' => 'Menu not found'], 404);
        }
    }
    public function getMenuTypes($id)
    {
        $menuTypes = MenuType::where('menu_id', $id)->get();
        return response()->json($menuTypes);
    }

    public function deleteMenuType($id)
    {
        $menuType = MenuType::find($id);

        if ($menuType) {
            $menuType->delete();
            return response()->json(['success' => 'Menu Type deleted successfully']);
        } else {
            return response()->json(['error' => 'Menu Type not found'], 404);
        }
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
            "menu_image_path" => '/images/menus/' . $filename,
            "menu_description" => $validatedData['menu_description'],
        ]);

        return redirect()->route("HotelAdmin.Menus")->with("success", "Menu Added");
    }
    public function storeMenuType(Request $request)
    {
        $user = auth()->user();
        $hotelID = $user->hotel_id;

        $validatedData = $request->validate([
            'type_name' => 'required|string',
            'menu_id' => 'required|integer',
            'type_price' => 'required|integer',
        ]);

        $menuType = MenuType::create([
            "type_name" => $validatedData['type_name'],
            "hotel_id" => $hotelID,
            "menu_id" => $validatedData['menu_id'],
            "type_price" => $validatedData['type_price'],
        ]);

        return redirect()->back()->with("success", "Menu Type Added");
    }

    public function deleteMenu($id)
    {
        $menu = Menu::find($id);
        //Delete Menu Types and Menu
        if ($menu) {
            $menuTypes = MenuType::where('menu_id', $id)->get();
            foreach ($menuTypes as $menuType) {
                $menuType->delete();
            }
            $menu->delete();
            return redirect()->back()->with("success", "Menu Deleted");
        } else {
            return response()->json(['error' => 'Menu not found'], 404);
        }

    }

    public function updateMenu(Request $request)
    {
        $validatedData = $request->validate([
            'menu_id' => 'required|integer',
            'menu_name' => 'required|string',
            'category_id' => 'required|integer',
            'menu_description' => 'required|string',
        ]);

        $menu = Menu::find($validatedData['menu_id']);

        if ($menu) {
            $menu->update([
                "menu_name" => $validatedData['menu_name'],
                "category_id" => $validatedData['category_id'],
                "menu_description" => $validatedData['menu_description'],
            ]);
            return redirect()->back()->with("success", "Menu Updated");
        } else {
            return response()->json(['error' => 'Menu not found'], 404);
        }
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
