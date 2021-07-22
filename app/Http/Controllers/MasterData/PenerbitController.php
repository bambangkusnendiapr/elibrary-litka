<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penerbit;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerbit = Penerbit::get();
        return view('masterdata.penerbit', compact('penerbit'));
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
        $penerbit_nama = $request->nama;
        $penerbit_kota = $request->kota;
        $penerbit_ket = $request->ket;

        \DB::table('penerbit')->insert([
            'penerbit_nama'=>$penerbit_nama,
            'penerbit_kota'=>$penerbit_kota,
            'penerbit_ket'=>$penerbit_ket
        ]);

        return redirect()->route('penerbit.index')->with('success', 'Data Penerbit Berhasil Ditambahkan');
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
 
        $form['penerbit_nama'] = $request->nama;
        $form['penerbit_kota'] = $request->kota;
        $form['penerbit_ket'] = $request->ket;

        Penerbit::find($id)->update($form);

        return redirect()->route('penerbit.index')->with('success', 'Data Penerbit Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penerbit::find($id)->delete();
 
        return redirect()->route('penerbit.index')->with('success', 'Data Penerbit Berhasil Dihapus');
    }
}
