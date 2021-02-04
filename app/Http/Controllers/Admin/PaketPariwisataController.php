<?php

namespace App\Http\Controllers\Admin;


use App\GalleryPackage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HargaPaketRequest;
use App\Http\Requests\Admin\PaketGaleriRequest;
use App\Http\Requests\Admin\PaketPariwisataRequest;
use App\PricePackage;
use App\TourPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaketPariwisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TourPackage::orderBy('created_at','desc')->get();
        return view('pages.admin.paket-travel.index',[
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
        return view('pages.admin.paket-travel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaketPariwisataRequest $paketrequest, HargaPaketRequest $hargarequest, PaketGaleriRequest $galerirequest)
    {
        $data_validasi = $paketrequest->all(); 
        $data_validasi['slug']= Str::slug($paketrequest->judul);

        $data_tour = TourPackage::create($data_validasi);

        $id_data_tour = $data_tour->id;

        $data = $galerirequest->all();
        if ($galerirequest->hasFile('image')) {
            foreach ($galerirequest->file('image') as $image) {
                $data['tour_package_id'] = $id_data_tour;
                $data['image'] = $image->store(
                    'assets/paket_gallery', 'public'
                );
                GalleryPackage::create($data);
            }
        }

        $data_price = $hargarequest->all();
        // dd($data_price);
        foreach ($hargarequest->price_title as $key => $value) {
                $data_price['tour_package_id'] = $id_data_tour;
                $data_price['price_title'] = $hargarequest->price_title[$key];
                $data_price['seat_59'] = $hargarequest->seat_59[$key];
                $data_price['seat_47'] = $hargarequest->seat_47[$key];
                $data_price['seat_30'] = $hargarequest->seat_30[$key];
                PricePackage::create($data_price);
        }
        return redirect()->route('paket-pariwisata.index')->with('status', 'Data Berhasil Di Buat !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = TourPackage::with('price_packages','gallery_packages')->findorFail($id);
        return view('pages.admin.paket-travel.detail',[
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = TourPackage::with('price_packages')->findorFail($id);

        return view('pages.admin.paket-travel.edit',[
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaketPariwisataRequest $paketrequest, HargaPaketRequest $hargarequest, $id)
    {
        $data_validasi = $paketrequest->all(); 
        $data_validasi['slug']= Str::slug($paketrequest->judul);

        $data_tour = TourPackage::with('price_packages')->findorFail($id);
        $data_tour->update($data_validasi);
        
        // $id_data_tour = $data_tour->id;
        
        // dd($data_price);
        foreach ($hargarequest->id as $key => $value) {
            $data_price = $hargarequest->all();
            $price_data = PricePackage::where('id', $hargarequest->id[$key]);
            $price_data->update([
                'price_title' => $hargarequest->price_title[$key],
                'seat_59' => $hargarequest->seat_59[$key],
                'seat_47' => $hargarequest->seat_47[$key],
                'seat_30' => $hargarequest->seat_30[$key]
            ]);
        }
        
        return redirect()->route('paket-pariwisata.index')->with('status', 'Data Berhasil Di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = TourPackage::findorFail($id);
        $data->price_packages()->delete();
        $data->gallery_packages()->delete();
        $data->delete();
        return redirect()->route('paket-pariwisata.index')->with('status', 'Data Berhasil Di Hapus !');
    }
}
