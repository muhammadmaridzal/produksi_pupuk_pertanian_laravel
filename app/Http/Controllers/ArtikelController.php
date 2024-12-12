<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ArtikelController extends Controller
{
    // Menampilkan daftar artikel
    public function index()
    {
        $artikel = Artikel::all();
        return view('artikel.artikel', compact('artikel'));
    }

    // Menampilkan halaman tambah artikel
    public function addPage()
    {
        return view('artikel.add-artikel');
    }

    // Menampilkan halaman edit artikel
    public function updatePage($id)
    {
        $artikel = Artikel::find($id);
        return view('artikel.edit-artikel', compact('artikel'));
    }

    // Menambahkan artikel baru
    public function create(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fotoName = uniqid() . '.' . $request->foto->extension();
        $request->foto->move(public_path('image/artikel/'), $fotoName);

        Artikel::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoName,
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    // Memperbarui artikel yang ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $artikel = Artikel::find($id);
        $fotoName = $artikel->foto;

        if ($request->hasFile('foto')) {
            $fotoName = uniqid() . '.' . $request->foto->extension();
            $request->foto->move(public_path('image/artikel/'), $fotoName);
        }

        $artikel->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoName,
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    // Mengunduh laporan artikel dalam format PDF
    public function pdf()
    {
        $artikel = Artikel::all();
        $pdf = Pdf::loadView('pdf', compact('artikel'));
        return $pdf->download('laporan.pdf');
    }

    // Menghapus artikel
    public function delete($id)
    {
        $artikel = Artikel::find($id);
        if ($artikel->foto && file_exists(public_path('image/artikel/' . $artikel->foto))) {
            unlink(public_path('image/artikel/' . $artikel->foto));
        }

        $artikel->delete();
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
