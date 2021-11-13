<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\AsetAktif;
use App\Models\DataAkun;
use App\Models\DataProyek;
use App\Models\PenambahanModal;
use App\Models\PengeluaranKas;
use App\Models\Prive;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArusKasController extends Controller
{
    public function index()
    {
        return view('interface.laporan.arus-kas.index');
    }

    public function result(Request $request)
    {
        $this->validate($request, [
            'dari'   => 'required',
            'sampai' => 'required'
        ]);

        $dari   = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $pemasukan   = DataProyek::whereBetween('tanggal_bayar', [$dari, $sampai])->sum('total_bayar');
        $pengeluaran = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->sum('total_pengeluaran');

        $dariPast   = date('m', strtotime($request->dari)) - 1;
        $sampaiPast = date('m', strtotime($request->sampai)) - 1;
        $kas        = AsetAktif::whereBetween('tanggal_akuisisi', [$dariPast, $sampaiPast])->sum('penyusutan');

        // $tambahanmodal = PenambahanModal::whereBetween('tanggal_penambahan', [$dari, $sampai])->sum('penambahan');
        $prive = DB::table('data_akuns')
            ->whereBetween('tanggal', [$dari, $sampai])
            ->where('id_tipe_akun', '=', 7)
            ->SUM('saldo_awal');

        $tambahmodal = DB::table('pemasukan_kas')
            ->whereBetween('tanggal_pemasukan', [$dari, $sampai])
            ->where('id_akun', '=', 1)
            ->SUM('jumlah_pemasukan');

        $getinvestasi = DB::table('data_akuns')
            ->whereBetween('tanggal', [$dari, $sampai])
            ->where('id_tipe_akun', '=', 2)
            ->get();

        $totalinves = DB::table('data_akuns')
            ->whereBetween('tanggal', [$dari, $sampai])
            ->where('id_tipe_akun', '=', 2)
            ->SUM('saldo_awal');

        return view('interface.laporan.arus-kas.index', compact('dari', 'sampai', 'pemasukan', 'pengeluaran',  'kas', 'prive', 'tambahmodal', 'getinvestasi', 'totalinves'));
    }

    public function pdf(Request $request)
    {
        $dari   = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $pemasukan   = DataProyek::whereBetween('tanggal_bayar', [$dari, $sampai])->sum('total_bayar');
        $pengeluaran = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->sum('total_pengeluaran');

        $dariPast   = date('m', strtotime($request->dari)) - 1;
        $sampaiPast = date('m', strtotime($request->sampai)) - 1;
        $kas        = AsetAktif::whereBetween('tanggal_akuisisi', [$dariPast, $sampaiPast])->sum('penyusutan');

        // $tambahanmodal = PenambahanModal::whereBetween('tanggal_penambahan', [$dari, $sampai])->sum('penambahan');
        $prive = DB::table('data_akuns')
            ->whereBetween('tanggal', [$dari, $sampai])
            ->where('id_tipe_akun', '=', 7)
            ->SUM('saldo_awal');

        $tambahmodal = DB::table('pemasukan_kas')
            ->whereBetween('tanggal_pemasukan', [$dari, $sampai])
            ->where('id_akun', '=', 1)
            ->SUM('jumlah_pemasukan');

        $getinvestasi = DB::table('data_akuns')
            ->whereBetween('tanggal', [$dari, $sampai])
            ->where('id_tipe_akun', '=', 2)
            ->get();

        $totalinves = DB::table('data_akuns')
            ->whereBetween('tanggal', [$dari, $sampai])
            ->where('id_tipe_akun', '=', 2)
            ->SUM('saldo_awal');

        $pdf = PDF::loadView('export.arus-kas', compact('dari', 'sampai', 'pemasukan', 'pengeluaran',  'kas', 'prive', 'tambahmodal', 'getinvestasi', 'totalinves'))->setPaper('a4', 'potrait')->setWarnings(false);
        return $pdf->stream('Laporan-Arus-Kas' . '.pdf');
    }
}
