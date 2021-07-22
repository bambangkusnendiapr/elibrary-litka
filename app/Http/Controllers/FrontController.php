<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Pengarang;
use App\Models\Kategori;
use App\Models\Penerbit;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::count();
        $pengarang = Pengarang::count();
        $penerbit = Penerbit::count();
        $kategori = Kategori::count();
        return view('front.front', compact('buku', 'pengarang', 'penerbit', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function buku()
    {
        $buku = Buku::orderBy('id', 'DESC')->get();

        return view('front.front_buku', compact('buku'));
    }

    public function bukusingle($buku_slug)
    {
        //ambil data buku yang dipilih
        $buku = Buku::where('buku_slug', $buku_slug)->first();

        //ketahui jumlah lihat
        $lihat_buku = $buku->buku_lihat; //0
        //tambah 1
        $lihat = $lihat_buku + 1;
        //persiapan save
        $buku->buku_lihat   = $lihat;
        //update
        $buku->save();

        return view('front.front_buku_single', compact('buku'));
    }

    // public function download($file)
    // {
    //     //ambil data buku yang dipilih
    //     $buku = Buku::where('buku_file', $file)->first();

    //     //ketahui jumlah lihat
    //     $buku_download = $buku->buku_download; //0 
    //     echo $buku_download; die;
    //     //tambah 1
    //     $download = $buku_download + 1;
    //     //persiapan save
    //     $buku->buku_download   = $download;
    //     //update
    //     $buku->save();

    //     // $files="./files/".$file;
    //     // return Response::download($files);
    // }
}
