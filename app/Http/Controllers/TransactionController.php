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
}
