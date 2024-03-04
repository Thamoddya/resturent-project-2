<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Hotel;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderdMenu;
use App\Models\Table;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    public function TableByFood($id)
    {

        $table = Table::where('table_id', $id)->first();

        $hotel = Hotel::where('id', $table->hotel_id)->first();

        // $qrCode = QrCode::create(url()->route('table-id-food', 1))
        //     ->setEncoding(new Encoding('UTF-8'))
        //     ->setErrorCorrectionLevel(ErrorCorrectionLevel::Low)
        //     ->setSize(100)
        //     ->setMargin(10)
        //     ->setForegroundColor(new Color(0, 0, 0));
        // $writer = new PngWriter();
        // $result = $writer->write($qrCode);
        // $dataUri = $result->getDataUri();

        $menus = Menu::where('hotel_id', $table->hotel_id)
            ->where('menu_available', '1')
            ->get();
        if ($table == null) {
            return "Invalid Table ID";
        } else {
            return view('Hotel.TableOrder', compact([
                'table',
                'menus',
                'hotel',
            ]));
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

        $table = Table::where('id', $data['tableId'])->first();
        $table->update([
            "isReserved" => 1
        ]);

        return response()->json([
            "attempt" => "success"
        ]);
    }

    public function storeNew(Request $request)
    {

        $data = $request->all();
        $orderID = hexdec(hash('crc32b', Str::uuid()));

        if ($data['tableId'] == null) {
            return response()->json([
                "Error" => "Select Table"
            ]);
        }
        if ($data['hotelId'] == null) {
            return response()->json([
                "Error" => "Invalid Hotel"
            ]);
        }
        $table = Table::where('table_id', $data['tableId'])->first();
        $order = Order::create([
            "hotel_id" =>$data['hotelId'] ,
            "table_id" => $table->id,
            "order_id" => $orderID,
            "isPaid" => 0,
            "customer_name" => $data['name'],
            "customer_mobile" => $data['mobile'],
            "customer_email" => $data['email'],
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
                "hotel_id" => $data['hotelId'],
                "menu_id" => $data['selectedItems'][$i]['id'],
                "qty" => $data['selectedItems'][$i]['quantity'],
            ]);
        }


        $table->update([
            "isReserved" => 1
        ]);

        return response()->json([
            "attempt" =>$data['tableId'],
            "orderID"=>$orderID
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

    public function confirmPayment($id)
    {
        $order = Order::where('order_id', $id)->first();
        $invoiceID = Str::uuid()->toString();
        if ($order) {
            // Update the isPaid field to 1
            $order->update(
                [
                    'isPaid' => 1,
                ]);

            Transaction::create([
                "hotel_id" =>$order->hotel_id,
                "order_id"=>$order->order_id,
                "total_price"=>$order->getOrderTotal(),
                "invoice_id"=>$invoiceID,
            ]);

            return response()->json(['message' => 'success', 'order' => $order], 200);
        } else {
            return response()->json(['message' => 'Order not found'], 404);
        }
    }

    
}
