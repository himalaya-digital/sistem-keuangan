<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\DataAkun;
use App\Models\DataProyek;
use App\Models\ModalAwal;
use App\Models\PenambahanModal;
use App\Models\PengeluaranKas;
use App\Models\Prive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PerubahanModalController extends Controller
{
    public function index()
    {
        return view('interface.laporan.perubahan-modal.index');
    }

    public function result(Request $request)
    {
        $this->validate($request, [
            'dari'   => 'required',
            'sampai' => 'required'
        ]);

        $dari   = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $modalawal = DB::table('data_akuns')
            ->whereBetween('tanggal', [$dari, $sampai])
            ->where('id_tipe_akun', '=', 4)
            ->SUM('saldo_awal');

        $totalpemasukan = DataProyek::whereBetween('tanggal_bayar', [$dari, $sampai])->sum('total_bayar');


        $getAkun = DB::table('data_akuns')
            ->whereBetween('tanggal', [$dari, $sampai])
            ->where('id_tipe_akun', '=', 3)
            ->get();

        $total = DB::table('data_akuns')
            ->whereBetween('tanggal', [$dari, $sampai])
            ->where('id_tipe_akun', '=', 3)
            ->SUM('saldo_awal');

        $prive = DB::table('data_akuns')
            ->whereBetween('tanggal', [$dari, $sampai])
            ->where('id_tipe_akun', '=', 7)
            ->SUM('saldo_awal');

        $tambahanmodal = DB::table('pemasukan_kas')
            ->whereBetween('tanggal_pemasukan', [$dari, $sampai])
            ->where('id_akun', '=', 1)
            ->SUM('jumlah_pemasukan');

        return view('interface.laporan.perubahan-modal.index', compact('dari', 'sampai', 'totalpemasukan', 'total', 'prive', 'tambahanmodal', 'modalawal'));
    }

    public function pdf(Request $request)
    {
        $dari   = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $modalawal = DB::table('data_akuns')
            ->whereBetween('tanggal', [$dari, $sampai])
            ->where('id_tipe_akun', '=', 4)
            ->SUM('saldo_awal');

        $totalpemasukan = DataProyek::whereBetween('tanggal_bayar', [$dari, $sampai])->sum('total_bayar');


        $getAkun = DB::table('data_akuns')
            ->whereBetween('tanggal', [$dari, $sampai])
            ->where('id_tipe_akun', '=', 3)
            ->get();

        $total = DB::table('data_akuns')
            ->whereBetween('tanggal', [$dari, $sampai])
            ->where('id_tipe_akun', '=', 3)
            ->SUM('saldo_awal');

        $prive = DB::table('data_akuns')
            ->whereBetween('tanggal', [$dari, $sampai])
            ->where('id_tipe_akun', '=', 7)
            ->SUM('saldo_awal');

        $tambahanmodal = DB::table('pemasukan_kas')
            ->whereBetween('tanggal_pemasukan', [$dari, $sampai])
            ->where('id_akun', '=', 1)
            ->SUM('jumlah_pemasukan');

        $pdf = PDF::loadView('export.perubahan', compact('dari', 'sampai', 'totalpemasukan', 'total', 'prive', 'tambahanmodal', 'modalawal'))->setPaper('a4', 'potrait')->setWarnings(false);
        return $pdf->stream('Laporan-Perubahan-Modal' . '.pdf');
    }
}
