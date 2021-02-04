<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VideoRequest;
use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Video::orderBy('created_at','desc')->get();
        return view('pages.admin.video.index',[
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

        return view('pages.admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $videorequest)
    {
        $data_video = $videorequest->all();
        // dd($data_video);
        foreach ($videorequest->title as $key => $value) {
                $data_video['title'] = $videorequest->title[$key];
                $data_video['url'] = $videorequest->url[$key];
                Video::create($data_video);
        }

        return redirect()->route('video.index')->with('status', 'Data Berhasil Di Buat !');
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
        $items = Video::findorfail($id);

        return view('pages.admin.video.edit',[
            'items' => $items
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

        $item = Video::findorFail($id);
        $item->update($data);
        return redirect()->route('video.index')->with('status', 'Data Berhasil Di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Video::findorFail($id);
        $item->delete();
        return redirect()->route('video.index')->with('status', 'Data Berhasil Di Hapus !');
    }
}
