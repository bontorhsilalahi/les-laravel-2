<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catatan; // Sesuaikan dengan namespace model Anda

class CatatanController extends Controller
{
    // Menampilkan semua data catatan
    public function index()
    {
        $catatan = Catatan::all();

        return view('catatan.index', compact('catatan'));
    }

    // Menampilkan form untuk membuat catatan baru
    public function create()
    {
        return view('catatan.create');
    }   

    // Menyimpan data catatan baru ke database
    public function store(Request $request)
    {
        // (Opsional) Tambahkan validasi jika diperlukan
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        Catatan::create($request->only(['judul', 'isi']));

        return redirect('/catatan')->with('sukses', 'Catatan berhasil disimpan!');
    }
}