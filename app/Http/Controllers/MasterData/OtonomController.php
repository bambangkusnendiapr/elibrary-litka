<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Otonom;

class OtonomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $otonom = Otonom::get();
        return view('masterdata.otonom', compact('otonom'));
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
        $otonom_nama = $request->nama;
        $otonom_ket = $request->ket;

        \DB::table('otonom')->insert([
            'otonom_nama'=>$otonom_nama,
            'otonom_ket'=>$otonom_ket
        ]);

        return redirect()->route('otonom.index')->with('success', 'Data Otonom Berhasil Ditambahkan');
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
        \DB::table('otonom')
        ->where('id', $id)
        ->update(['otonom_nama' => $request->nama, 'otonom_ket' => $request->otonom_ket]);

        return redirect()->route('otonom.index')->with('success', 'Data Otonom Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Otonom::find($id)->delete();
 
        return redirect()->route('otonom.index')->with('success', 'Data Otonom Berhasil Dihapus');
    }
}
