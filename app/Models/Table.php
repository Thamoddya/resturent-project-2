<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

    public function hotel(){
        return $this->belongsTo(Hotel::class,'hotel_id');
    }

    public function generateQr(){
        return QrCode::format('png')->generate(url('/table-food/' . $this->table_id));
    }

    
}
