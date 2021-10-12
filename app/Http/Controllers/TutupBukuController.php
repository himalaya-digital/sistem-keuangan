<?php

namespace App\Http\Controllers;

use App\Models\PemasukanKas;
use App\Models\PengeluaranKas;
use Illuminate\Http\Request;

class TutupBukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('interface.tutup-buku.index');
    }

    public function results(Request $request)
    {
        $this->validate($request, [
            'dari'   => 'required',
            'sampai' => 'required'
        ]);

        $dari   = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $debits = PemasukanKas::whereBetween('tanggal_pemasukan', [$dari, $sampai])->get();
        $kredits = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->get();

        return view('interface.tutup-buku.index', compact('debits', 'kredits'));
    }
}
