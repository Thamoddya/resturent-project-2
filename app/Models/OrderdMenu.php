<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderdMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        "hotel_id",
        "order_id",
        "qty",
        "menu_id"
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}