<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\TourPackage;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $items = TourPackage::with(['gallery_packages', 'price_packages'])->get();
        $gallerys = Gallery::get();
        $videos = Video::get();
        return view('pages.home', [
            'items' => $items,
            'gallerys' => $gallerys,
            'videos' => $videos
        ]);
    }
}
