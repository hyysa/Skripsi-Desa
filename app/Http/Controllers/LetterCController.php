<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\LetterC;


class LetterCController extends Controller
{
    public function index(Request $request)
{
    $letterc = LetterC::all();
    return view('administrator.letterc', compact('letterc'));
}

/**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $query = Letterc::all(); // Ambil semua data dari database
        return view('administrator.tambah-letterc', compact('query'));
    }
/**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'nomor_letterc' => 'required',
            'nomor_persil' => 'required',
            'nama_pemilik' => 'required',
            'luas' => 'required',
            'kelas_desa' => 'required',
            'jenis_tanah' => 'required',
        ]);

        Letterc::create([
            'nomor_letterc' => $request->nomor_letterc,
            'nomor_persil' => $request->nomor_persil,
            'nama_pemilik' => $request->nama_pemilik,
            'luas' => $request->luas,
            'kelas_desa' => $request->kelas_desa,
            'jenis_tanah' => $request->jenis_tanah,
        ]);

        return redirect()->route('letterc.index')->with('success', 'Data Letter C berhasil ditambahkan');
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
        $query = Letterc::find($id);
        return view('administrator.edit-letterc', compact('query'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nomor_letterc' => 'required',
            'nomor_persil' => 'required',
            'nama_pemilik' => 'required',
            'luas' => 'required',
            'kelas_desa' => 'required',
            'jenis_tanah' => 'required',
        ]);

        $query = Letterc::find ($id);
        $query->update([
            'nomor_letterc' => $request->nomor_letterc,
            'nomor_persil' => $request->nomor_persil,
            'nama_pemilik' => $request->nama_pemilik,
            'luas' => $request->luas,
            'kelas_desa' => $request->kelas_desa,
            'jenis_tanah' => $request->jenis_tanah,
        ]);

        return redirect()->route('letterc.index')->with('success', 'Data Letter C berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan pesan berdasarkan ID
        $query = Letterc::find($id);

        if (!$query) {
            // Redirect atau berikan respons jika pesan tidak ditemukan
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Hapus pesan dari database
        $query->delete();

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
