<?php

namespace App\Http\Controllers\Admin;

use App\GalleryPackage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PaketGaleriRequest;
use App\TourPackage;
use Illuminate\Http\Request;

class PaketGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = GalleryPackage::with(['tour_packages'])->orderBy('created_at','desc')->get();

        return view('pages.admin.paket-gallery.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tour_package = TourPackage::all();
        return view('pages.admin.paket-gallery.create',[
            'tour_package' => $tour_package
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaketGaleriRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/paket_gallery','public'
        );

        GalleryPackage::create($data);
        return redirect()->route('paket-gallery.index')->with('status', 'Data Berhasil Di Simpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = GalleryPackage::findOrFail($id);
        $tour_packages = TourPackage::all();

        return view('pages.admin.paket-gallery.edit',[
            'item' => $item,
            'tour_packages' => $tour_packages
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaketGaleriRequest $request, $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/paket_gallery','public'
        );
        $item = GalleryPackage::findOrFail($id);
        $item->update($data);
        return redirect()->route('paket-gallery.index')->with('status', 'Data Berhasil Di Ubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = GalleryPackage::findOrFail($id);
        $item->delete();
        return redirect()->route('paket-gallery.index')->with('status', 'Data Berhasil Di Hapus !');
    }
}
