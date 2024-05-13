<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        "hotel_id" ,
        "order_id",
        "total_price",
        "invoice_id",
    ];

    public function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }
}
