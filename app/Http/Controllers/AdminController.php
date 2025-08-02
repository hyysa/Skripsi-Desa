<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Video;
use App\Models\Pemilik;
use App\Models\Letterc;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::all();
        $video =  Video::all();
        $pemilik = Pemilik::all();
        $letterc = Letterc::all();
        // Data untuk diagram batang sebelumnya
        $jumlahLetterC = \App\Models\LetterC::selectRaw("jenis_tanah, COUNT(*) as total")
    ->groupBy("jenis_tanah")
    ->get();

$labels = [];
$data = [];

foreach ($jumlahLetterC as $item) {
    if ($item->jenis_tanah === 's') {
        $labels[] = 'Sawah';
    } elseif ($item->jenis_tanah === 'tk') {
        $labels[] = 'Tanah Kering';
    } else {
        $labels[] = $item->jenis_tanah;
    }

    $data[] = $item->total;
}

        // Pie chart: total luas per kelas desa
        $kelasLuas = \App\Models\LetterC::selectRaw("kelas_desa, SUM(luas) as total_luas")
                        ->groupBy('kelas_desa')
                        ->get();

        $kelasLabels = $kelasLuas->pluck('kelas_desa')->toArray();
        $kelasData = $kelasLuas->pluck('total_luas')->toArray();

        // Histogram: ambil semua luas tanah
        $luasTanah = \App\Models\LetterC::pluck('luas')->toArray();
        return view('administrator.dashboard', compact('berita', 'video', 'pemilik', 'letterc','labels','data','kelasLabels', 'kelasData',
        'luasTanah'));
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
}
