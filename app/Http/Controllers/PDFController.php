<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class PDFController extends Controller
{
    public function generateOrderInvoice($id)
    {
        $order = Order::with('orderdMenus')->where('order_id', $id)->first();
        $hotel  = Hotel::where('id',$order->hotel_id)->first();


        if($order){
            $data = [
                'invoiceID' => $order->transaction->invoice_id,
                'orderID' => $order->order_id,
                'hotel'=> $hotel,
                'logo'=>asset($hotel->hotel_image_path),
                'customer_name'=>$order->customer_name,
                'customer_mobile'=>$order->customer_mobile,
                'customer_email'=>$order->customer_email,
                'order_total'=>$order->getOrderTotal(),
                'order_items'=>$order->orderdMenus(),
                'order'=>$order,
            ];
            
            $pdf = PDF::loadView('pdf.orderInvoice', $data);
            return $pdf->stream();
        }
        else{
            return "Invoice Not Found";
        };
    }
}
