<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricePackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_package_id', 'price_title', 'seat_59', 'seat_47', 'seat_30'
    ];

    protected $hidden = [];

    public function tour_packages()
    {
        return $this->belongsTo(TourPackage::class, 'tour_package_id', 'id');
    }
}
