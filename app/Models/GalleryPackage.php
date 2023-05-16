<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_package_id', 'image'
    ];

    protected $hidden = [];

    public function tour_packages()
    {
        return $this->belongsTo(TourPackage::class, 'tour_package_id', 'id');
    }
}
