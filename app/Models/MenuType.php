<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuType extends Model
{
    use HasFactory;

    protected $table = 'menu_types';


    protected $fillable = [
        'type_name',
        'hotel_id',
        'menu_id',
        'type_price',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }


}
