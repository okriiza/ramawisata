<?php

namespace App\Http\Controllers;

use App\TourPackage;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $slug){
        $items = TourPackage::with(['gallery_packages','price_packages'])
                            ->where('slug', $slug)
                            ->firstorFail();
        return view('pages.detail',[
            'items' => $items
        ]);
    }
}
