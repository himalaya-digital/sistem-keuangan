<?php

namespace App\Http\Controllers\OutIn;

use App\Http\Controllers\Controller;
use App\Models\DataAkun;
use App\Models\DataProyek;
use App\Models\PemasukanKas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PemasukanKasController extends Controller
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
        $pemasukans = PemasukanKas::with('dataakun', 'dataproyek.customer')->get();

        return view('interface.out-in.pemasukan-kas', compact('pemasukans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $akuns   = DataAkun::all();
        $proyeks = DataProyek::with('customer')->get();

        return view('interface.out-in.add-pemasukan-kas', compact('akuns', 'proyeks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'keterangan_pemasukan' => 'required|max:30'
        ])->validate();

        $fields = [
            'id_user'              => Auth::user()->id,
            'id_akun'              => $request->id_akun,
            'keterangan_pemasukan' => $request->keterangan_pemasukan,
            'tanggal_pemasukan'    => $request->tanggal_pemasukan,
            'jumlah_pemasukan'     => $request->jumlah_pemasukan,
        ];


        // $getTotalBayar             = DataProyek::where('id_customer', $request->id_proyek)->first();
        // $fields['id_proyek']       = $getTotalBayar->id;

        $store = PemasukanKas::create($fields);

        $updates = DataAkun::find($request->id_akun);
        $updateData = ['saldo_awal' => $updates->saldo_awal + $store->jumlah_pemasukan];

        $updates->update($updateData);

        return redirect()->route('pemasukan-kas.index')->with('success', 'Data Pemasukan ditambahkan');
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
        $datas   = PemasukanKas::find($id);
        $akuns   = DataAkun::all();
        $proyeks = DataProyek::with('customer')->get();

        return view('interface.out-in.edit-data-pemasukan', compact('datas', 'akuns', 'proyeks'));
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
        $datas  = PemasukanKas::find($id);

        Validator::make($request->all(), [
            'keterangan_pemasukan' => 'required|max:30'
        ])->validate();

        $fields = [
            'id_user'              => Auth::user()->id,
            'id_akun'              => $request->id_akun,
            'keterangan_pemasukan' => $request->keterangan_pemasukan,
            'tanggal_pemasukan'    => $request->tanggal_pemasukan,
            'jumlah_pemasukan'     => $request->jumlah_pemasukan,
        ];

        // $getTotalBayar             = DataProyek::where('id_customer', $request->id_proyek)->first();
        // $fields['id_proyek']       = $getTotalBayar->id;

        $datas->update($fields);

        $updates = DataAkun::find($request->id_akun);
        $updateData = ['saldo_awal' => $updates->saldo_awal + $datas->jumlah_pemasukan];

        $updates->update($updateData);
        return redirect()->route('pemasukan-kas.index')->with('success', 'Data Pemasukan berhasil diubah');
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
