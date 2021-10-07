<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\AsetAktif;
use App\Models\DataAkun;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asets = AsetAktif::with('dataakun')->latest()->get();
        return view('interface.aset.aset-aktif', compact('asets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $akuns = DataAkun::all();
        return view('interface.aset.add-aset-aktif', compact('akuns'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = [
            'nama_aset'        => strtolower($request->nama_aset),
            'id_akun'          => $request->id_akun,
            'biaya_akuisisi'   => $request->biaya_akuisisi,
            'nilai_residu'     => $request->nilai_residu,
            'masa_manfaat'     => $request->masa_manfaat,
            'tanggal_akuisisi' => $request->tanggal_akuisisi
        ];

        $rumusPenyusutan = $request->biaya_akuisisi - $request->nilai_residu;
        $getPenyusutan = $rumusPenyusutan / $request->masa_manfaat;

        $fields['penyusutan'] = $getPenyusutan;

        AsetAktif::create($fields);
        return redirect()->route('aset-aktif.index')->with('success', 'Data Aset ditambahkan');
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
        $asets = AsetAktif::find($id);
        $akuns = DataAkun::all();

        return view('interface.aset.edit-aset-aktif', compact('asets', 'akuns'));
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
        $asets = AsetAktif::find($id);

        $fields = [
            'nama_aset'        => strtolower($request->nama_aset),
            'id_akun'          => $request->id_akun,
            'biaya_akuisisi'   => $request->biaya_akuisisi,
            'nilai_residu'     => $request->nilai_residu,
            'masa_manfaat'     => $request->masa_manfaat,
            'tanggal_akuisisi' => $request->tanggal_akuisisi
        ];

        $rumusPenyusutan = $request->biaya_akuisisi - $request->nilai_residu;
        $getPenyusutan = $rumusPenyusutan / $request->masa_manfaat;

        $fields['penyusutan'] = $getPenyusutan;

        $asets->update($fields);
        return redirect()->route('aset-aktif.index')->with('success', 'Data Aset berhasil diubah');
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
}
