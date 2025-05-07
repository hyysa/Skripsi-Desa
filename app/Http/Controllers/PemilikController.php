<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\Pemetaan;
use illuminate\Support\Facades\DB;


class PemilikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemilik = Pemilik::all();
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
            'persil' => 'required',
            'luas' => 'required',
            'nomor_letterc' => 'required',
            'keterangan' => 'required',
        ]);

        Pemilik::create([
            'nama_pemilik' => $request->nama_pemilik,
            'persil' => $request->persil,
            'luas' => $request->luas,
            'nomor_letterc' => $request->nomor_letterc,
            'keterangan' => $request->keterangan,
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
        $pemilik = Pemilik::find($id);
        $pemetaan = Pemetaan::all();
        return view('administrator.edit-pemilik', compact('pemilik', 'pemetaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pemilik' => 'required',
            'persil' => 'required',
            'luas' => 'required',
            'nomor_letterc' => 'required',
            'keterangan' => 'required',
        ]);

        $pemilik = Pemilik::findOrFail($id);
        $pemilik->update([
            'nama_pemilik' => $request->nama_pemilik,
            'persil' => $request->persil,
            'luas' => $request->luas,
            'nomor_letterc' => $request->nomor_letterc,
            'keterangan' => $request->keterangan,
        ]);

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
        $pemilik = Pemilik::all();
        return view('administrator.cetak', compact('pemilik'));
    }
}
