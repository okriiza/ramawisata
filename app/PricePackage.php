<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PricePackage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tour_package_id', 'price_title','seat_59','seat_47','seat_30'
    ];

    protected $hidden =[

    ];

    public function tour_packages(){
        return $this->belongsTo(TourPackage::class, 'tour_package_id','id');
    }
}
