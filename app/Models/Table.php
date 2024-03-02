<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        "table_id",
        "table_name",
        "hotel_id",
        "max_seats",
        "isActive",
        "isReserved"
    ];
}
