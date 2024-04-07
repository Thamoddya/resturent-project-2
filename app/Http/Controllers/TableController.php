<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;
use App\Models\Hotel;
use App\Models\Table;

class TableController extends Controller
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
    public function store(StoreTableRequest $request, $id)
    {
        $user = auth()->user();

        $validated = $request->validated();
        // dd($validated);
        $hotel = Hotel::where('hotel_id', $id)->first();

        if ($hotel) {
            $table = Table::create([
                'hotel_id' => $hotel->id,
                'table_name' => $validated['table_name'],
                'max_seats' => $validated['max_seats'],
                'table_id' => uniqid(),
                'isReserved'=>0
            ]);
            return redirect()->back()->with('success', 'Table Created');
        } else {
            return redirect()->back()->with('error', 'Error , Contact Admin');
        }

    }


    /**
     * Display the specified resource.
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $user = auth()->user();
        $table = Table::where('id', $id)
            ->where('hotel_id', $user->hotel_id)
            ->first();

        if ($table) {
            $table->update([
                'isReserved' => 0
            ]);
            return redirect()->back()->with('success', 'Updated');
        } else {
            return redirect()->back()->with('error', 'Table Not Found');
        }
    }

    public function updateStatusDown($id)
    {
        $user = auth()->user();
        $table = Table::where('table_id', $id)
            ->where('hotel_id', $user->hotel_id)
            ->first();


        if ($table) {
            $table->update([
                'isActive' => 0
            ]);
            return redirect()->back()->with('success', 'Updated');
        } else {
            return redirect()->back()->with('error', 'Table Not Found');
        }
    }

    public function updateStatusUp($id)
    {
        $user = auth()->user();
        $table = Table::where('table_id', $id)
            ->where('hotel_id', $user->hotel_id)
            ->first();

        if ($table) {
            $table->update([
                'isActive' => 1
            ]);
            return redirect()->back()->with('success', 'Updated');
        } else {
            return redirect()->back()->with('error', 'Table Not Found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        //
    }
}
