<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\OrderdMenu;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
    public function store(Request $request)
    {

        $data = $request->all();
        $user = auth()->user();
        $orderID = hexdec(hash('crc32b', Str::uuid()));

        if ($data['tableId'] == null) {
            return response()->json([
                "Error" => "Select Table"
            ]);
        }

        $order = Order::create([
            "hotel_id" => $user->hotel_id,
            "table_id" => $data['tableId'],
            "order_id" => $orderID,
            "isPaid" => 0,
            "customer_name" => $data['name'],
            "customer_mobile" => $data['mobile'],
            "customer_email" => $data['email'],
            "employee_id" => $user->id,
        ]);

        // Log order creation
        if (!$order) {
            \Log::error('Error creating order');
            return response()->json([
                "Error" => "Failed to create order"
            ]);
        }

        for ($i = 0; $i < count($data['selectedItems']); $i++) {
            $orderedMenu = OrderdMenu::create([
                "order_id" => $order->id,
                "hotel_id" => $user->hotel_id,
                "menu_id" => $data['selectedItems'][$i]['id'],
                "qty" => $data['selectedItems'][$i]['quantity'],
            ]);
        }

        $table = Table::where('id',$data['tableId'])->first();
        $table->update([
            "isReserved" => 1
        ]);

        return response()->json([
            "attempt" =>"success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
