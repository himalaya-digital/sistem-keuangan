<?php

namespace App\Http\Controllers;

use App\Models\AsetAktif;
use Illuminate\Http\Request;

class DataJurnalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('interface.data-jurnal.index');
    }

    public function cari(Request $request)
    {
        $this->validate($request, [
            'dari'   => 'required',
            'sampai' => 'required'
        ]);

        $dari   = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $results = AsetAktif::whereBetween('tanggal_akuisisi', [$dari, $sampai])->get();

        return view('interface.data-jurnal.index', compact('results'));
    }

    public function results()
    {
        return view('interface.data-jurnal.result');
        // $year = date('Y');
        // $test = $year + 5;

        // $a = date('d/m/Y');
        // $e = date('d/m' . '/' . $test);

        // $r = $a . '-' . $e;

        // return $r;
    }
}
