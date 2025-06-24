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
        $existingPolygons = \App\Models\Pemetaan::all()->map(function ($peta) {
            return [
                'type' => 'Feature',
                'geometry' => json_decode($peta->koordinat),
                'properties' => [
                    'blok' => $peta->blok,
                    'persil' => $peta->persil,
                    'kelas' => $peta->kelas,
                ],
            ];
        });
        return view('administrator.tambah-peta', [
            'pemetaan' => $pemetaan,
            'existingPolygons' => json_encode([
                'type' => 'FeatureCollection',
                'features' => $existingPolygons,
            ])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'blok' => 'required',
            'persil' => 'required',
            'kelas' => 'required',
            'koordinat' => 'required', // Validasi agar koordinat harus berupa JSON
        ]);


        Pemetaan::create([
            'blok' => $request->blok,
            'persil' => $request->persil,
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
        $pemetaan = Pemetaan::findOrFail($id);

        $existingPolygons = Pemetaan::where('id_pemetaan', '!=', $id)->get()->map(function ($peta) {
            return [
                'type' => 'Feature',
                'geometry' => json_decode($peta->koordinat),
                'properties' => [
                    'blok' => $peta->blok,
                    'persil' => $peta->persil,
                    'kelas' => $peta->kelas,
                ],
            ];
        });

        return view('administrator.edit-pemetaan', [
            'pemetaan' => $pemetaan,
            'existingPolygons' => [
                'type' => 'FeatureCollection',
                'features' => $existingPolygons
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'blok' => 'required',
            'kelas' => 'required',
            'persil' => 'required',
            'koordinat' => 'required',
        ]);

        $pemetaan = Pemetaan::findOrFail($id);
        $pemetaan->update([
            'blok' => $request->blok,
            'kelas' => $request->kelas,
            'persil' => $request->persil,
            'koordinat' => $request->koordinat, // Pastikan format tetap JSON
        ]);

        return redirect()->route('pemetaan.index')->with('success', 'Data pemetaan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan pesan berdasarkan ID
        $pemetaan = Pemetaan::find($id);

        if (!$pemetaan) {
            // Redirect atau berikan respons jika pesan tidak ditemukan
            return redirect()->back()->with('error', 'Data pemetaan tidak ditemukan.');
        }

        // Hapus pesan dari database
        $pemetaan->delete();

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->back()->with('success', 'Data pemetaan berhasil dihapus.');
    }
}
