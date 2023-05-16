<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $items = User::orderBy('created_at', 'desc')->get();
        return view('pages.admin.user.index', [
            'items' => $items
        ]);
    }
    public function destroy($id)
    {
        $item = User::findorFail($id);
        $item->delete();
        return redirect()->route('user.index')->with('status', 'Data Berhasil Di Hapus !');
    }
}
