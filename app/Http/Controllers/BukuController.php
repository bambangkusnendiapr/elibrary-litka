<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Buku;
use App\Models\Pengarang;
use App\Models\Kategori;
use App\Models\Penerbit;
use File;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::orderBy('id', 'DESC')->get();
        return view('buku.buku', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengarang = Pengarang::get();
        $kategori = Kategori::get();
        $penerbit = Penerbit::get();
        return view('buku.tambah', compact('pengarang', 'kategori', 'penerbit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required|unique:buku,buku_judul',
            'pengarang' => 'required',
            'kategori' => 'required',
            'penerbit' => 'required',
            'filefoto' => 'mimes:jpeg,jpg,png,gif|max:2000' // max 2000kb
        ],
        [
            'judul.required' => 'harus diisi',
            'judul.unique' => 'ini sudah ada, silahkan masukan judul lain',
            'pengarang.required' => 'harus diisi',
            'kategori.required' => 'harus diisi',
            'penerbit.required' => 'harus diisi',
            'filefoto.mimes' => 'harus diisi file gambar',
            'filefoto.max' => 'maksimal 2 MB'
        ]);

        $buku = new Buku;
        $buku->buku_kode    = $request->kode;
        $buku->buku_judul   = $request->judul;
        $buku->pengarang_id = $request->pengarang;
        $buku->kategori_id  = $request->kategori;
        $buku->penerbit_id  = $request->penerbit;
        $buku->buku_tahun   = $request->tahun;
        $buku->buku_kota    = $request->kota;
        $buku->buku_jumlah  = 1;
        $buku->buku_lihat   = 0;
        $buku->buku_slug    = time().Str::slug($request->judul, '-');
        $buku->buku_download   = 0;
        $buku->buku_ket     = $request->ket;
        $buku->buku_file     = $request->pdf;

        if($request->hasFile('filefoto') == true){
    
            $file2 = $request->file('filefoto');
            $namafile2 = time()."".$file2->getClientOriginalName();
    
            $tujuan_upload = 'images';
            $file2->move($tujuan_upload,$namafile2);
            $buku->buku_gambar = $namafile2;

        }

        // if($request->hasFile('pdf') == true){
    
        //     $file2 = $request->file('pdf');
        //     $namafile2 = time()."".$file2->getClientOriginalName();
    
        //     $tujuan_upload = 'files';
        //     $file2->move($tujuan_upload,$namafile2);
        //     $buku->buku_file = $namafile2;

        // }

        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Data Buku Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = Buku::find($id);
        $pengarang = Pengarang::get();
        $kategori = Kategori::get();
        $penerbit = Penerbit::get();
        return view('buku.edit', compact('buku', 'pengarang', 'kategori', 'penerbit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'judul' => 'required',
            'pengarang' => 'required',
            'kategori' => 'required',
            'penerbit' => 'required',
            'filefoto' => 'mimes:jpeg,jpg,png,gif|max:2000' // max 2000kb
        ],
        [
            'judul.required' => 'harus diisi',
            'pengarang.required' => 'harus diisi',
            'kategori.required' => 'harus diisi',
            'penerbit.required' => 'harus diisi',
            'filefoto.mimes' => 'harus diisi file gambar',
            'filefoto.max' => 'maksimal 2 MB'
        ]);

        $buku = Buku::find($id);
        $buku->buku_judul   = $request->judul;
        $buku->pengarang_id = $request->pengarang;
        $buku->kategori_id  = $request->kategori;
        $buku->penerbit_id  = $request->penerbit;
        $buku->buku_tahun   = $request->tahun;
        $buku->buku_kota    = $request->kota;
        $buku->buku_slug    = time().Str::slug($request->judul, '-');
        $buku->buku_ket     = $request->ket;
        $buku->buku_file    = $request->pdf;

        if($request->hasFile('filefoto') == true)
        {
            $file = $request->file('filefoto');
            $filefoto = time()."".$file->getClientOriginalName();
            $file_ext  = $file->getClientOriginalExtension();
            
            $local_gambar = "images/".$buku->buku_gambar;
            if(File::exists($local_gambar))
            {
                File::delete($local_gambar);
            }

            $tujuan_upload = 'images';
            $file->move($tujuan_upload,$filefoto);
            $buku->buku_gambar = $filefoto;
        }

        // if($request->hasFile('pdf') == true)
        // {
        //     $file = $request->file('pdf');
        //     $pdf = time()."".$file->getClientOriginalName();
        //     $file_ext  = $file->getClientOriginalExtension();
            
        //     $local_pdf = "files/".$buku->buku_file;
        //     if(File::exists($local_pdf))
        //     {
        //         File::delete($local_pdf);
        //     }

        //     $tujuan_upload = 'files';
        //     $file->move($tujuan_upload,$pdf);
        //     $buku->buku_file = $pdf;
        // }

        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Data Buku Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $buku = Buku::find($id);
        $local = "images/".$buku->buku_gambar;
        File::delete($local);
        // $local_file = "files/".$buku->buku_file;
        // File::delete($local_file);
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Data Buku Berhasil Dihapus');
    }
}
