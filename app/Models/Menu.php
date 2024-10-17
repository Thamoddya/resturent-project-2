<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        "hotel_id",
        "menu_name",
        "menu_image_path",
        "menu_available",
        "menu_description",
        "category_id"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function orderdMenus()
    {
        return $this->hasMany(OrderdMenu::class);
    }
}
