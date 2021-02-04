<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourPackage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'judul', 'slug','tentang_wisata','fasilitas','notes'
    ];

    protected $hidden =[

    ];

    public function price_packages(){
        return $this->hasMany(PricePackage::class, 'tour_package_id','id');
    }

    public function gallery_packages(){
        return $this->hasMany(GalleryPackage::class, 'tour_package_id','id');
    }
}
