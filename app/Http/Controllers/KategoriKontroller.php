<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriKontroller extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        return view('backend.content.kategori.list', compact('kategori'));
    }
    public function tambah(){
        return view('backend.content.kategori.formTambah');

    }
    public function prosesTambah(Request $request){
        $this->validate($request, [
            'nama_kategori' => 'required'
        ]);

        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;

        try{
            $kategori->save();
            return redirect(route('kategori.index'))->with('pesan',['success','Berhasil Tambah Kategori']);
        }catch (\Exception $e){
            return redirect(route('kategori.index'))->with('pesan',['danger','Gagal Tambah Kategori']);
        }

    }
    public function ubah($id){
        $kategori = Kategori::findOrFail($id);
        return view('backend.content.kategori.formUbah', compact('kategori'));

    }
    public function prosesUbah(Request $request){
        $this->validate($request, [
            'id_kategori' => 'required',
            'nama_kategori' => 'required',
        ]);

        $kategori = Kategori::findOrFail($request->id_kategori);
        $kategori->nama_kategori = $request->nama_kategori;

        try{
            $kategori->save();
            return redirect(route('kategori.index'))->with('pesan',['success','Berhasil Ubah Kategori']);
        }catch (\Exception $e){
            return redirect(route('kategori.index'))->with('pesan',['danger','Gagal Ubah Kategori']);
        }

    }
    public function hapus($id){

        $kategori = Kategori::findOrFail($id);


        try{
            $kategori->delete();
            return redirect(route('kategori.index'))->with('pesan',['success','Berhasil Hapus Kategori']);
        }catch (\Exception $e){
            return redirect(route('kategori.index'))->with('pesan',['danger','Gagal Hapus Kategori']);
        }

    }
}
