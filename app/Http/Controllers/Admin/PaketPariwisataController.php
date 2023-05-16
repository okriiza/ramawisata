<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HargaPaketRequest;
use App\Http\Requests\PaketGaleriRequest;
use App\Http\Requests\PaketPariwisataRequest;
use App\Models\GalleryPackage;
use App\Models\PricePackage;
use App\Models\TourPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaketPariwisataController extends Controller
{
    public function index()
    {
        $items = TourPackage::orderBy('created_at', 'desc')->get();
        return view('pages.admin.paket-travel.index', [
            'items' => $items
        ]);
    }


    public function create()
    {
        return view('pages.admin.paket-travel.create');
    }


    public function store(
        PaketPariwisataRequest $paketrequest,
        HargaPaketRequest $hargarequest,
        PaketGaleriRequest $galerirequest
    ) {
        $dataValidasi = $paketrequest->all();
        $dataValidasi['slug'] = Str::slug($paketrequest->judul);

        $dataTour = TourPackage::create($dataValidasi);

        $idDataTour = $dataTour->id;

        $data = $galerirequest->all();
        if ($galerirequest->hasFile('image')) {
            foreach ($galerirequest->file('image') as $image) {
                $data['tour_package_id'] = $idDataTour;
                $data['image'] = $image->store(
                    'assets/paket_gallery',
                    'public'
                );
                GalleryPackage::create($data);
            }
        }

        $dataPrice = $hargarequest->all();
        foreach ($hargarequest->price_title as $key => $value) {
            $dataPrice['tour_package_id'] = $idDataTour;
            $dataPrice['price_title'] = $hargarequest->price_title[$key];
            $dataPrice['seat_59'] = $hargarequest->seat_59[$key];
            $dataPrice['seat_47'] = $hargarequest->seat_47[$key];
            $dataPrice['seat_30'] = $hargarequest->seat_30[$key];
            PricePackage::create($dataPrice);
        }
        return redirect()->route('paket-pariwisata.index')->with('status', 'Data Berhasil Di Buat !');
    }


    public function show($id)
    {
        $item = TourPackage::with('price_packages', 'gallery_packages')->findorFail($id);
        return view('pages.admin.paket-travel.detail', [
            'item' => $item
        ]);
    }


    public function edit($id)
    {
        $item = TourPackage::with('price_packages')->findorFail($id);

        return view('pages.admin.paket-travel.edit', [
            'item' => $item
        ]);
    }


    public function update(PaketPariwisataRequest $paketrequest, HargaPaketRequest $hargarequest, $id)
    {
        $dataValidasi = $paketrequest->all();
        $dataValidasi['slug'] = Str::slug($paketrequest->judul);

        $dataTour = TourPackage::with('price_packages')->findorFail($id);
        $dataTour->update($dataValidasi);
        foreach ($hargarequest->id as $key => $value) {
            $priceData = PricePackage::where('id', $hargarequest->id[$key]);
            $priceData->update([
                'price_title' => $hargarequest->price_title[$key],
                'seat_59' => $hargarequest->seat_59[$key],
                'seat_47' => $hargarequest->seat_47[$key],
                'seat_30' => $hargarequest->seat_30[$key]
            ]);
        }

        return redirect()->route('paket-pariwisata.index')->with('status', 'Data Berhasil Di Update !');
    }


    public function destroy($id)
    {
        $data = TourPackage::findorFail($id);
        $data->price_packages()->delete();
        $data->gallery_packages()->delete();
        $data->delete();
        return redirect()->route('paket-pariwisata.index')->with('status', 'Data Berhasil Di Hapus !');
    }
}
