<?php

namespace App\Http\Controllers;

use App\Models\Pemetaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PemetaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemetaan = Pemetaan::all();
        return view('administrator.pemetaan', compact('pemetaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pemetaan = Pemetaan::all(); // Ambil semua data pemetaan dari database
        return view('administrator.tambah-peta', compact('pemetaan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'nama_pemilik' => 'required',
            'dusun' => 'required',
            'blok' => 'required',
            'luas' => 'required',
            'kelas' => 'required',
            'koordinat' => 'required', // Validasi agar koordinat harus berupa JSON
        ]);

        Pemetaan::create([
            'nama_pemilik' => $request->nama_pemilik,
            'dusun' => $request->dusun,
            'blok' => $request->blok,
            'luas' => $request->luas,
            'kelas' => $request->kelas,
            'koordinat' => $request->koordinat, // Data polygon dari Map
        ]);

        return redirect()->route('pemetaan.index')->with('message', 'Pemetaan berhasil ditambahkan');
    }

    private static function validateCoordinates(array $coordinates): bool
    {
        // Define your coordinate format validation logic here
        // Example: Check if each inner array has 2 elements (longitude, latitude)
        // and if the values are valid numbers within your coordinate system's bounds.
        return true; // Replace with your actual validation logic
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
        $pemetaan = Pemetaan::find($id);
        return view('administrator.edit-pemetaan', compact('pemetaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pemilik' => 'required',
            'dusun' => 'required',
            'blok' => 'required',
            'luas' => 'required',
            'kelas' => 'required',
            'koordinat' => 'required',
        ]);

        $pemetaan = Pemetaan::findOrFail($id);
        $pemetaan->update([
            'nama_pemilik' => $request->nama_pemilik,
            'dusun' => $request->dusun,
            'blok' => $request->blok,
            'luas' => $request->luas,
            'kelas' => $request->kelas,
            'koordinat' => $request->koordinat, // Pastikan format tetap JSON
        ]);

        return redirect()->route('pemetaan.index')->with('success', 'Data pemetaan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
