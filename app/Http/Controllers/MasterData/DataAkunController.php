<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\DataAkun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DataAkunController extends Controller
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
        $datas = DataAkun::all();
        return view('interface.master-data.data-akun', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interface.master-data.add-data-akun');
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
            'kode_akun' => 'required|unique:data_akuns',
            'nama_akun' => 'required|max:20',
            'tipe_akun' => 'required|max:20'
        ])->validate();

        $fields = [
            'id_user'   => Auth::user()->id,
            'nama_akun' => strtolower($request->nama_akun),
            'kode_akun' => strtolower($request->kode_akun),
            'tipe_akun' => strtolower($request->tipe_akun)
        ];

        DataAkun::create($fields);
        return redirect()->route('data-akun.index')->with('success', 'Data akun berhasil ditambahkan');
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
        $datas = DataAkun::find($id);
        return view('interface.master-data.edit-data-akun', compact('datas'));
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
        $datas = DataAkun::find($id);

        Validator::make($request->all(), [
            'nama_akun' => 'required|max:20',
            'tipe_akun' => 'required|max:20'
        ])->validate();

        $fields = [
            'id_user'   => Auth::user()->id,
            'nama_akun' => strtolower($request->nama_akun),
            'kode_akun' => $datas->kode_akun,
            'tipe_akun' => strtolower($request->tipe_akun)
        ];

        $datas->update($fields);
        return redirect()->route('data-akun.index')->with('success', 'Data akun berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datas = DataAkun::find($id);
        $datas->delete();
        return redirect()->route('data-akun.index')->with('success', 'Data akun berhasil dihapus');
    }
}
