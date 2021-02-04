<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\TourPackage;
use App\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $items = TourPackage::with(['gallery_packages','price_packages'])->get();
        $gallerys = Gallery::all();
        $videos = Video::all();
        return view('pages.home',[
            'items' => $items,
            'gallerys' => $gallerys,
            'videos' => $videos
        ]);
    }
}
