<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemetaan;
use Illuminate\Support\Facades\DB;

class PetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peta = Pemetaan::select(
            'tb_pemetaan.*',
            DB::raw('GROUP_CONCAT(pemilik.nama_pemilik SEPARATOR ", ") as nama_pemilik')
        )
            ->leftJoin('tb_pemilik as pemilik', 'tb_pemetaan.persil', '=', 'pemilik.persil')
            ->groupBy(
                'tb_pemetaan.id',          // Kolom ID
                'tb_pemetaan.blok',        // Kolom blok
                'tb_pemetaan.kelas',       // Kolom kelas
                'tb_pemetaan.persil',      // Kolom persil
                'tb_pemetaan.koordinat',   // Kolom koordinat
                'tb_pemetaan.created_at',  // Kolom created_at
                'tb_pemetaan.updated_at'   // Kolom updated_at jika ada
            )
            ->get();
        return view('pages.profil.peta', ['title' => 'peta'], compact('peta'));
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
