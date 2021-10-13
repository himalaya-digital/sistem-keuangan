<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\DataProyek;
use App\Models\PemasukanKas;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index()
    {
        return view('interface.laporan.laporan-pemasukan');
    }

    public function result(Request $request)
    {
        $this->validate($request, [
            'dari'   => 'required',
            'sampai' => 'required'
        ]);

        $dari   = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $pemasukans = PemasukanKas::whereBetween('tanggal_pemasukan', [$dari, $sampai])->get();
        $total = DataProyek::whereBetween('tanggal_bayar', [$dari, $sampai])->sum('total_bayar');

        return view('interface.laporan.laporan-pemasukan', compact('pemasukans', 'total'));
    }
}
