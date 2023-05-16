<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'slug', 'tentang_wisata', 'fasilitas', 'notes'
    ];

    protected $hidden = [];

    public function price_packages()
    {
        return $this->hasMany(PricePackage::class, 'tour_package_id', 'id');
    }

    public function gallery_packages()
    {
        return $this->hasMany(GalleryPackage::class, 'tour_package_id', 'id');
    }
}
