<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::all();
        return view('administrator.berita', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrator.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required',
            'isi_berita' => 'required',
            'kategori' => 'required',
            'dokumentasi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi file gambar
        ]);

        // Simpan gambar yang diunggah ke direktori public/storage/gambar
        $gambarPath = $request->file('dokumentasi')->store('gambar', 'public');

        // Buat entri baru dalam database
        Berita::create([
            'nama_author' => $request->nama_author,
            'judul' => $request->judul,
            'isi_berita' => $request->isi_berita,
            'kategori' => $request->kategori,
            'dokumentasi' => $gambarPath // Simpan path gambar ke database
        ]);

        // Redirect atau beri respons sesuai kebutuhan
        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
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
        $berita = Berita::find($id);
        return view('administrator.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required',
            'isi_berita' => 'required',
            'kategori' => 'required',
            'dokumentasi' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Jika ingin memperbarui dokumentasi
        ]);

        // Temukan berita berdasarkan ID
        $berita = Berita::findOrFail($id);

        // Perbarui data berita
        $berita->judul = $request->judul;
        $berita->isi_berita = $request->isi_berita;
        $berita->kategori = $request->kategori;

        // Jika ada file yang diunggah, simpan ke storage
        if ($request->hasFile('dokumentasi')) {
            // Hapus file lama sebelum menyimpan yang baru
            Storage::delete($berita->dokumentasi);

            // Simpan file yang diunggah ke direktori public/storage/gambar
            $berita->dokumentasi = $request->file('dokumentasi')->store('gambar', 'public');
        }

        // Simpan perubahan
        $berita->save();

        // Redirect atau beri respons sesuai kebutuhan
        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan pesan berdasarkan ID
        $berita = Berita::find($id);

        if (!$berita) {
            // Redirect atau berikan respons jika pesan tidak ditemukan
            return redirect()->back()->with('error', 'Berita tidak ditemukan.');
        }

        // Hapus pesan dari database
        $berita->delete();

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->back()->with('success', 'Berita berhasil dihapus.');
    }
}
