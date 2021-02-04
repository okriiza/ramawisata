<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GaleriRequest;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Gallery::orderBy('created_at','desc')->get();

        return view('pages.admin.gallery.index',[
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
        return view('pages.admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GaleriRequest $request)
    {

        $data = $request->all();
        // dd($data);
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $data['image'] = $image->store(
                    'assets/gallery_pariwisata', 'public'
                );
                Gallery::create($data);
            }
        }
        return redirect()->route('gallery.index')->with('status', 'Data Berhasil Di Simpan !');
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
        $item = Gallery::findorFail($id);
        
        return view('pages.admin.gallery.edit',[
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
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery_pariwisata', 'public'
        );
        $item = Gallery::findorFail($id);
        $item->update($data);
        return redirect()->route('gallery.index')->with('status', 'Data Berhasil Di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Gallery::findorFail($id);
        $item->delete();
        return redirect()->route('gallery.index')->with('status', 'Data Berhasil Di Hapus !');
    }
}
