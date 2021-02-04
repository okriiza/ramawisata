<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryPackage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tour_package_id','image'
    ];

    protected $hidden =[

    ];

    public function tour_packages(){
        return $this->belongsTo(TourPackage::class, 'tour_package_id','id');
    }
}
