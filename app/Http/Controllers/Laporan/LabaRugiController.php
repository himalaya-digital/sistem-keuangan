<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\DataAkun;
use App\Models\DataProyek;
use App\Models\PengeluaranKas;
use PDF;
use Illuminate\Http\Request;

class LabaRugiController extends Controller
{
    public function index()
    {
        return view('interface.laporan.laba-rugi.index');
    }

    public function result(Request $request)
    {
        $this->validate($request, [
            'dari'   => 'required',
            'sampai' => 'required'
        ]);

        $dari   = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $totalpemasukan = DataProyek::whereBetween('tanggal_bayar', [$dari, $sampai])->sum('total_bayar');

        $getAkun = DataAkun::where('tipe_akun', 'beban')->get();

        foreach ($getAkun as $key) {
            $pengeluarans = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->where('id_akun', $key->id)->get();
            $total = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->where('id_akun', $key->id)->sum('total_pengeluaran');
        }


        return view('interface.laporan.laba-rugi.index', compact('totalpemasukan', 'dari', 'sampai', 'pengeluarans', 'total'));
    }

    public function pdf(Request $request)
    {
        $dari   = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $totalpemasukan = DataProyek::whereBetween('tanggal_bayar', [$dari, $sampai])->sum('total_bayar');

        $getAkun = DataAkun::where('tipe_akun', 'beban')->get();

        foreach ($getAkun as $key) {
            $pengeluarans = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->where('id_akun', $key->id)->get();
            $total = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->where('id_akun', $key->id)->sum('total_pengeluaran');
        }

        $pdf = PDF::loadView('export.laba-rugi', compact('totalpemasukan', 'dari', 'sampai', 'pengeluarans', 'total'))->setPaper('a4', 'potrait')->setWarnings(false);
        return $pdf->stream('Laporan-Laba-Rugi' . '.pdf');
    }
}
