<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;


class DetailController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        return view('pages.berita', ['title' => 'berita'], compact('berita'));
    }

    public function show($id)
    {
        $berita = Berita::find($id);
        return view('pages.berita', ['title' => 'berita'], compact('berita'));
    }
}
