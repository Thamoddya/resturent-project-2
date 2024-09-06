<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Client\Request;

class TransactionController extends Controller
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
    public function store($id)
    {

        $orderData = Order::where('id', $id)->first();
        $orderTotal = $orderData->getOrderTotal();
        $user = auth()->user();

        $transaction = Transaction::create([
            "hotel_id" => $orderData->hotel_id,
            "order_id" => $orderData->id,
            "total_price" => $orderTotal,
            "invoice_id" => "INV-" . time() . rand(1000, 9999)
        ]);
        $orderData->update([
            "isPaid" => 1,
            "employee_id" => $user->id
        ]);

        return redirect()->back()->with('success', 'Transaction Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
    public function payToCasher($order_id)
    {
        $order = Order::where('order_id', $order_id)->first();
        if ($order) {
            $order->update([
                'isPaid' => 2
            ]);
            return redirect()->back()->with('success', 'Payment Successfull');
        } else {
            return redirect()->back()->with('error', 'Not Found');
        }
    }

    public function PaymentHash($id)
    {

        // $orderData = Order::where('order_id',$id)->first();
        // $orderdFoods = $orderData->orderdMenus;

        // $orderUserData = $orderData;

        // $merchant_id = config('app.payhere.merchant_id');
        // $order_id = $orderData->order_id;
        // $amount = $orderData->total_price;
        // $currency = 'LKR';
        // $merchant_secret = config('app.payhere.secret');
        // $hash = strtoupper(
        //     md5(
        //         $merchant_id .
        //         $order_id .
        //         number_format($amount, 2, '.', '') .
        //         $currency .
        //         strtoupper(md5($merchant_secret))
        //     )
        // );

        // // $data = [
        // //     'first_name' => $orderUserData->customer_name,
        // //     'last_name' => $orderUserData->customer_name,
        // //     'email' => $orderUserData->customer_email,
        // //     'phone' => $orderUserData->customer_mobile,
        // //     'address' => 'Main Rd , Anuradhapura , Eriyagama',
        // //     'city' => 'Anuradhapura',
        // //     'country' => 'Sri lanka',
        // //     'order_id' => $order_id,
        // //     'items' => $orderdFoods,
        // //     'currency' => 'LKR',
        // //     'amount' => $amount,
        // //     'return_url'=>route('confirm.order.payment',$orderData->invoice_id),
        // //     'notify_url'=>'www.notify_url.com',
        // //     'cancel_url'=>'www.cancel_url.com',
        // // ];

        // return response()->json([
        //     'merchant_id'=>$merchant_id,
        //     'first_name' => $orderUserData->name,
        //     'last_name' => $orderUserData->name,
        //     'email' => $orderUserData->email,
        //     'phone' => $orderUserData->name,
        //     'address'=>"Main Rd , Anuradhapura , Eriyagama",
        //     'city'=>"Anuradhapura",
        //     'country'=>"Sri lanka",
        //     'items' => $orderdFoods,
        //     'currency'=>$currency,
        //     'amount'=>$amount,
        //     'hash'=>$hash,
        //     'order_id' => $order_id,
        // ]);

        $amount = 1000;
        $order_id = uniqid('CRS');
        $currency = "LKR";
        $merchant_id = '1224284';
        $merchant_secret = 'MTQ2NjY1NjE4OTE2ODU1OTg4MDA3NTQ4Mzc0Mzk1Njc2NDE1MA==';
        $hash = strtoupper(
            md5(
                $merchant_id .
                $order_id .
                number_format($amount, 2, '.', '') .
                $currency .
                strtoupper(md5($merchant_secret))
            )
        );
        return response()->json([
            "hash" => $hash,
            "order_id" => $order_id,
            "amount" => $amount,
            "currency" => $currency,
            "merchant_id" => $merchant_id,
            "first_name" => "John",
            "last_name" => "Doe",
            "email" => "thamo@gmail.com",
            "phone" => "0771234567",
            "address" => "No. 1, Galle Road",
            "city" => "Colombo",
            "country" => "Sri Lanka",
            "items" => [
                [
                    "name" => "Demo Item 01",
                    "quantity" => 1,
                    "amount" => 1000
                ],
                [
                    "name" => "Demo Item 02",
                    "quantity" => 2,
                    "amount" => 2000
                ]
            ],
            "itemData" => [
                "name" => "Demo Item 01",
                "quantity" => 1,
                "amount" => 1000
            ],
        ], 200);
    }
}
