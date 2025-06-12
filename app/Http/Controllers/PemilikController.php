<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\Pemetaan;
use App\Models\PemilikTanah;
use illuminate\Support\Facades\DB;
use illuminate\Support\Facades\Auth;


class PemilikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemilik = Pemilik::with('pemetaan')->get();
        return view('administrator.pemilik', compact('pemilik'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pemetaan = Pemetaan::all();
        return view('administrator.tambah-pemilik', compact('pemetaan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pemilik' => 'required',
            'id_pemetaan' => 'required|exists:tb_pemetaan,id_pemetaan',
            'luas' => 'required|integer',
            'nomor_letterc' => 'required|integer',
            'keterangan' => 'required',
        ]);

        // Simpan data ke tb_pemilik
        $pemilik = Pemilik::create([
            'nama_pemilik' => $request->nama_pemilik,
            'luas' => $request->luas,
            'nomor_letterc' => $request->nomor_letterc,
            'keterangan' => $request->keterangan,
        ]);

        // Simpan ke tabel pivot
        PemilikTanah::create([
            'id_pemilik' => $pemilik->id_pemilik,
            'id_pemetaan' => $request->id_pemetaan,
            'id_user' => Auth::id(),
        ]);
        return redirect()->route('pemilik.index')->with('success', 'Data pemilik berhasil ditambahkan.');
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
        $pemilik = Pemilik::with('pemetaan')->findOrFail($id);
        $pemetaan = Pemetaan::all();

        // Ambil id_pemetaan dari relasi pivot
        $pivot = $pemilik->pemetaan->first()?->id_pemetaan;
        $pivot = $pemilik->pemetaan->first()?->id_pemetaan;
        return view('administrator.edit-pemilik', compact('pemilik', 'pemetaan', 'pivot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pemilik' => 'required',
            'luas' => 'required|integer',
            'nomor_letterc' => 'required|integer',
            'keterangan' => 'required',
            'id_pemetaan' => 'required|exists:tb_pemetaan,id_pemetaan',
        ]);

        // Ambil data pemilik
        $pemilik = Pemilik::findOrFail($id);

        // Update data di tabel pemilik
        $pemilik->update([
            'nama_pemilik' => $request->nama_pemilik,
            'luas' => $request->luas,
            'nomor_letterc' => $request->nomor_letterc,
            'keterangan' => $request->keterangan,
        ]);

        // Update data di pivot table (tb_pemilik_tanah)
        // Cari baris pivot berdasarkan id_pemilik
        $pivot = PemilikTanah::where('id_pemilik', $pemilik->id_pemilik)->first();

        if ($pivot) {
            // Update pemetaan dan user yang mengedit
            $pivot->update([
                'id_pemetaan' => $request->id_pemetaan,
                'id_user' => Auth::id(),
            ]);
        }

        return redirect()->route('pemilik.index')->with('success', 'Data pemilik berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan pesan berdasarkan ID
        $pemilik = Pemilik::find($id);

        if (!$pemilik) {
            // Redirect atau berikan respons jika pesan tidak ditemukan
            return redirect()->back()->with('error', 'Pemilik tanah tidak ditemukan.');
        }

        // Hapus pesan dari database
        $pemilik->delete();

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->back()->with('success', 'Data pemilik tanah berhasil dihapus.');
    }

    public function cetak()
    {
        $pemilik = Pemilik::with('pemetaan')->get();
        return view('administrator.cetak', compact('pemilik'));
    }
}
