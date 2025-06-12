<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Video;
use App\Models\Pemilik;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::paginate(4);
        $carousel_berita = Berita::orderBy('created_at', 'desc')->get();
        $video = Video::all();
        return view('pages.home', ['title' => 'home'], compact('berita', 'video', 'carousel_berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request)
    {

        // Validasi input
        $request->validate([
            'query' => 'required|string|min:3', // Minimal 3 karakter
        ]);

        // Ambil query pencarian dari input pengguna
        $query = $request->input('query');

        // Lakukan pencarian berdasarkan judul berita
        $beritaResults = Berita::where('judul', 'like', "%$query%")->get();

        // Kembalikan hasil pencarian ke tampilan bersama dengan variabel $query
        return view('pages.search-results', ['title' => 'search-results'], compact('beritaResults', 'query'));
    }

    public function listPemilik()
    {
        $pemilik = Pemilik::with('pemetaan')->get();
        return view('pages.profil.daftar-pemilik', ['title' => 'daftar-pemilik'], compact('pemilik'));
    }
}
