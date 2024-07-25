<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model buku
use App\Models\BukuModel;

class BukuController extends Controller
{
 
    //method untuk tampil data buku
    public function bukutampil() {
        $databuku = BukuModel::orderby('kode_buku', 'ASC')->paginate(5);

        return view('halaman.view_buku', ['buku' => $databuku]);
    }
    
    //method untuk menambah buku
    public function bukutambah(Request $request) {
        $this->validate($request, [
            'kode_buku' => 'required',
            'judul' => 'required',
            'penulis' => 'required',
            'kategori' => 'required'
        ]);
    
        // Debugging: Check the request data
        // dd($request->all());
    
        BukuModel::create([
            'kode_buku' => $request->kode_buku,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'kategori' => $request->kategori
        ]);
        
        return redirect('/buku');
    }
    

    // method hapus data buku
    public function bukuhapus($id_buku) {
        $databuku=BukuModel::find($id_buku);
        $databuku->delete();

        return redirect()->back();
    }

    // method untuk edit data buku

    public function bukuedit ($id_buku, request $request) {
        
        $this->validate($request, [
            'kode_buku' => 'required',
            'judul' => 'required',
            'penulis' => 'required',
            'kategori' => 'required'
        ]);

        $id_buku = BukuModel::find($id_buku);
        $id_buku->kode_buku = $request->kode_buku;
        $id_buku->judul = $request->judul;
        $id_buku->penulis = $request->penulis;
        $id_buku->kategori = $request->kategori;

        $id_buku->save();

        return redirect()->back();
    }
}
