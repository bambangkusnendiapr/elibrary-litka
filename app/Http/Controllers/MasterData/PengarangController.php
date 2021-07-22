<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengarang;

class PengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengarang = Pengarang::get();
        return view('masterdata.pengarang', compact('pengarang'));
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
        $pengarang_nama = $request->nama;
        $pengarang_ket = $request->ket;

        \DB::table('pengarang')->insert([
            'pengarang_nama'=>$pengarang_nama,
            'pengarang_ket'=>$pengarang_ket
        ]);

        return redirect()->route('pengarang.index')->with('success', 'Data Pengarang Berhasil Ditambahkan');
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
        $form = [];
 
        $form['pengarang_nama'] = $request->nama;
        $form['pengarang_ket'] = $request->ket;

        Pengarang::find($id)->update($form);

        return redirect()->route('pengarang.index')->with('success', 'Data Pengarang Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengarang::find($id)->delete();
 
        return redirect()->route('pengarang.index')->with('success', 'Data Pengarang Berhasil Dihapus');
    }
}
