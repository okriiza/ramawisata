<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GaleriRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $items = Gallery::orderBy('created_at', 'desc')->get();

        return view('pages.admin.gallery.index', [
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('pages.admin.gallery.create');
    }

    public function store(GaleriRequest $request)
    {

        $data = $request->all();
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $data['image'] = $image->store(
                    'assets/gallery_pariwisata',
                    'public'
                );
                Gallery::create($data);
            }
        }
        return redirect()->route('gallery.index')->with('status', 'Data Berhasil Di Simpan !');
    }

    public function edit($id)
    {
        $item = Gallery::findorFail($id);

        return view('pages.admin.gallery.edit', [
            'item' => $item
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery_pariwisata',
            'public'
        );
        $item = Gallery::findorFail($id);
        $item->update($data);
        return redirect()->route('gallery.index')->with('status', 'Data Berhasil Di Update !');
    }

    public function destroy($id)
    {
        $item = Gallery::findorFail($id);
        $item->delete();
        return redirect()->route('gallery.index')->with('status', 'Data Berhasil Di Hapus !');
    }
}
