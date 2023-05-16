<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaketGaleriRequest;
use App\Models\GalleryPackage;
use App\Models\TourPackage;
use Illuminate\Http\Request;

class PaketGalleryController extends Controller
{
    public function index()
    {
        $items = GalleryPackage::with(['tour_packages'])->orderBy('created_at', 'desc')->get();

        return view('pages.admin.paket-gallery.index', [
            'items' => $items
        ]);
    }


    public function create()
    {
        $tourPackage = TourPackage::get();
        return view('pages.admin.paket-gallery.create', [
            'tour_package' => $tourPackage
        ]);
    }


    public function store(PaketGaleriRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/paket_gallery',
            'public'
        );

        GalleryPackage::create($data);
        return redirect()->route('paket-gallery.index')->with('status', 'Data Berhasil Di Simpan !');
    }


    public function edit($id)
    {
        $item = GalleryPackage::findOrFail($id);
        $tourPackages = TourPackage::all();

        return view('pages.admin.paket-gallery.edit', [
            'item' => $item,
            'tour_packages' => $tourPackages
        ]);
    }


    public function update(PaketGaleriRequest $request, $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/paket_gallery',
            'public'
        );
        $item = GalleryPackage::findOrFail($id);
        $item->update($data);
        return redirect()->route('paket-gallery.index')->with('status', 'Data Berhasil Di Ubah !');
    }


    public function destroy($id)
    {
        $item = GalleryPackage::findOrFail($id);
        $item->delete();
        return redirect()->route('paket-gallery.index')->with('status', 'Data Berhasil Di Hapus !');
    }
}
