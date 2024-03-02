<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "hotel_id",
        "table_id",
        "order_id",
        "isPaid",
        "customer_name",
        "customer_mobile",
        "customer_email",
        "employee_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }

    public function orderdMenus()
    {
        return $this->hasMany(OrderdMenu::class, 'order_id');
    }

    public function getOrderTotal()
    {
        $totalPrice = 0;

        if ($this->orderdMenus) {
            foreach ($this->orderdMenus as $orderdMenu) {
                $menu = Menu::where('id', $orderdMenu->menu_id)->first();
                $menuPrice = $menu->menu_price * $orderdMenu->qty;
                $totalPrice += $menuPrice;
            }
        }

        return $totalPrice;
    }
}