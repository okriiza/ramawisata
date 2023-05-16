<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $items = Video::orderBy('created_at', 'desc')->get();
        return view('pages.admin.video.index', [
            'items' => $items
        ]);
    }


    public function create()
    {

        return view('pages.admin.video.create');
    }


    public function store(VideoRequest $videorequest)
    {
        $dataVideo = $videorequest->all();
        foreach ($videorequest->title as $key => $value) {
            $dataVideo['title'] = $videorequest->title[$key];
            $dataVideo['url'] = $videorequest->url[$key];
            Video::create($dataVideo);
        }

        return redirect()->route('video.index')->with('status', 'Data Berhasil Di Buat !');
    }


    public function edit($id)
    {
        $items = Video::findorfail($id);

        return view('pages.admin.video.edit', [
            'items' => $items
        ]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = Video::findorFail($id);
        $item->update($data);
        return redirect()->route('video.index')->with('status', 'Data Berhasil Di Update !');
    }


    public function destroy($id)
    {
        $item = Video::findorFail($id);
        $item->delete();
        return redirect()->route('video.index')->with('status', 'Data Berhasil Di Hapus !');
    }
}
