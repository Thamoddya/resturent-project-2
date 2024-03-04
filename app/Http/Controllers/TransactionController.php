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

        $orderData = Order::where('id',$id)->first();
        $orderTotal = $orderData->getOrderTotal();


        $transaction = Transaction::create([
            "hotel_id" =>$orderData->hotel_id,
            "order_id" =>$orderData->id,
            "total_price" =>$orderTotal,
            "invoice_id" =>"INV-" . time() . rand(1000, 9999)
        ]);
        $orderData->update([
            "isPaid" => 1
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

    public function PaymentHash($id)
    {

        $orderData = Order::where('order_id',$id)->first();
        $orderdFoods = $orderData->orderdMenus;

        $orderUserData = $orderData;

        $merchant_id = config('app.payhere.merchant_id');
        $order_id = $orderData->order_id;
        $amount = $orderData->total_price;
        $currency = 'LKR';
        $merchant_secret = config('app.payhere.secret');
        $hash = strtoupper(
            md5(
                $merchant_id .
                $order_id .
                number_format($amount, 2, '.', '') .
                $currency .
                strtoupper(md5($merchant_secret))
            )
        );

        // $data = [
        //     'first_name' => $orderUserData->customer_name,
        //     'last_name' => $orderUserData->customer_name,
        //     'email' => $orderUserData->customer_email,
        //     'phone' => $orderUserData->customer_mobile,
        //     'address' => 'Main Rd , Anuradhapura , Eriyagama',
        //     'city' => 'Anuradhapura',
        //     'country' => 'Sri lanka',
        //     'order_id' => $order_id,
        //     'items' => $orderdFoods,
        //     'currency' => 'LKR',
        //     'amount' => $amount,
        //     'return_url'=>route('confirm.order.payment',$orderData->invoice_id),
        //     'notify_url'=>'www.notify_url.com',
        //     'cancel_url'=>'www.cancel_url.com',
        // ];

        return response()->json([
            'merchant_id'=>$merchant_id,
            'first_name' => $orderUserData->name,
            'last_name' => $orderUserData->name,
            'email' => $orderUserData->email,
            'phone' => $orderUserData->name,
            'address'=>"Main Rd , Anuradhapura , Eriyagama",
            'city'=>"Anuradhapura",
            'country'=>"Sri lanka",
            'items' => $orderdFoods,
            'currency'=>$currency,
            'amount'=>$amount,
            'hash'=>$hash,
            'order_id' => $order_id,
        ]);
    }
}
