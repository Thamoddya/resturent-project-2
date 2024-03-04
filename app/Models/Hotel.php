<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        "hotel_name",
        "hotel_email",
        "hotel_image_path",
        "table_count",
        "hotel_id",
        "hotel_address",
        "hotel_mobile",
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function table()
    {
        return $this->hasMany(Table::class);
    }

    public function menus(){
        return $this->hasMany(Menu::class);
    }
}
