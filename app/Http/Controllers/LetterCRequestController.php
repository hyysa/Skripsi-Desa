<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\LettercRequest;

class LetterCRequestController extends Controller
{
    public function index()
    {
        $lettercreq = LettercRequest::all();
        return view('administrator.requestletterc', compact('lettercreq'));
    }

    public function create()
    {
        return view('pages.layanan.lettercrequest');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemohon' => 'required',
            'nohp' => 'required',
            'nik' => 'required',
            'persil' => 'required',
            'an_letterc' => 'required',
            'keterangan' => 'required',
        ]);

        LettercRequest::create($request->only('nama_pemohon', 'nohp', 'an_letterc', 'nik', 'persil', 'keterangan'));

        return redirect()->back()->with('success', 'Permohonan Anda Telah Dibuat, Anda akan dihubungi melalui WhatsApp');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan pesan berdasarkan ID
        $query = LettercRequest::find($id);

        if (!$query) {
            // Redirect atau berikan respons jika pesan tidak ditemukan
            return redirect()->back()->with('error', 'Permohonan tidak ditemukan.');
        }

        // Hapus pesan dari database
        $query->delete();

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->back()->with('success', 'Permohonan berhasil dihapus.');
    }
}
