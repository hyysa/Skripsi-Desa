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
        $peta = DB::table('tb_pemetaan')
            ->leftJoin('tb_pemilik_tanah', 'tb_pemetaan.id_pemetaan', '=', 'tb_pemilik_tanah.id_pemetaan')
            ->leftJoin('tb_pemilik', 'tb_pemilik.id_pemilik', '=', 'tb_pemilik_tanah.id_pemilik')
            ->select(
                'tb_pemetaan.*',
                DB::raw('GROUP_CONCAT(tb_pemilik.nama_pemilik SEPARATOR ", ") as nama_pemilik')
            )
            ->groupBy(
                'tb_pemetaan.id_pemetaan',
                'tb_pemetaan.blok',
                'tb_pemetaan.kelas',
                'tb_pemetaan.persil',
                'tb_pemetaan.koordinat',
                'tb_pemetaan.created_at',
                'tb_pemetaan.updated_at'
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
