<?php

namespace App\Models;

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\QrCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\Writer\ValidationException;


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

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function generateQr()
    {

        // return QrCode::create(url('/table-food/' . $this->table_id))->;
        // $result = Builder::create()
        //     ->writer(new PngWriter())
        //     ->writerOptions([])
        //     ->data('Custom QR code contents')
        //     ->encoding(new Encoding('UTF-8'))
        //     ->errorCorrectionLevel(ErrorCorrectionLevel::High)
        //     ->size(300)
        //     ->margin(10)
        //     ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
        //     ->logoPath(asset('assets/images/cropped-texta-logo-1.png'))
        //     ->logoResizeToWidth(50)
        //     ->logoPunchoutBackground(true)
        //     ->labelText('This is the label')
        //     ->labelFont(new NotoSans(20))
        //     ->labelAlignment(LabelAlignment::Center)
        //     ->validateResult(false)
        //     ->build();

        $writer = new PngWriter();

        $qrCode = QrCode::create(url('/table-food/' . $this->table_id))
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(ErrorCorrectionLevel::Low)
            ->setSize(1000)
            ->setMargin(10)
            ->setRoundBlockSizeMode(RoundBlockSizeMode::Margin)
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

            
        $result = $writer->write($qrCode);

        $imageData = $result->getString();

        $imageBase64 = base64_encode($imageData);

        $imageDataUri = 'data:image/png;base64,' . $imageBase64;

        return $imageDataUri;
        // return QrCode::format('png')->generate(url('/table-food/' . $this->table_id));
    }


}
