<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\AsetAktif;
use App\Models\DataAkun;
use App\Models\DataProyek;
use App\Models\ModalAwal;
use App\Models\PengeluaranKas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LaporanNeracaController extends Controller
{
    public function index()
    {
        $is_search = false;
        return view('interface.laporan.neraca.index', compact('is_search'));
    }

    public function results(Request $request)
    {
        $this->validate($request, [
            'dari'   => 'required',
            'sampai' => 'required'
        ]);

        $is_search = true;
        $dari   = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $aktiva_lancar = DataAkun::whereBetween('tanggal', [$dari, $sampai])->where('id_tipe_akun', 1)->get();
        $aktiva_lancar_sum = DataAkun::whereBetween('tanggal', [$dari, $sampai])->where('id_tipe_akun', 1)->sum('saldo_awal');
        $aktiva_tetap = DataAkun::whereBetween('tanggal', [$dari, $sampai])->where('id_tipe_akun', 2)->get();
        $aktiva_tetap_sum = DataAkun::whereBetween('tanggal', [$dari, $sampai])->where('id_tipe_akun', 2)->sum('saldo_awal');
        $utang = DataAkun::whereBetween('tanggal', [$dari, $sampai])->where('id_tipe_akun', 7)->get();
        $utang_sum = DataAkun::whereBetween('tanggal', [$dari, $sampai])->where('id_tipe_akun', 7)->sum('saldo_awal');
        $utang_lancar = DataAkun::whereBetween('tanggal', [$dari, $sampai])->where('id_tipe_akun', 3)->get();
        $utang_lancar_sum = DataAkun::whereBetween('tanggal', [$dari, $sampai])->where('id_tipe_akun', 3)->sum('saldo_awal');
        $modal = DataAkun::whereBetween('tanggal', [$dari, $sampai])->where('id_tipe_akun', 4)->get();
        $modal_sum = DataAkun::whereBetween('tanggal', [$dari, $sampai])->where('id_tipe_akun', 4)->sum('saldo_awal');

        $total_aktiva = $aktiva_lancar_sum + $aktiva_tetap_sum;
        $total_pasiva = ($utang_lancar_sum + $utang_sum) + $modal_sum;

        return view('interface.laporan.neraca.index', compact('is_search', 'aktiva_lancar', 'aktiva_tetap', 'aktiva_lancar_sum', 'aktiva_tetap_sum', 'utang', 'utang_sum', 'utang_lancar', 'utang_lancar_sum', 'modal', 'modal_sum', 'total_aktiva', 'total_pasiva', 'dari', 'sampai'));
    }

    public function export(Request $request)
    {
        $dari   = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $aktiva_lancar = DataAkun::whereBetween('tanggal', [$dari, $sampai])->where('id_tipe_akun', 1)->get();
        $aktiva_lancar_sum = DataAkun::whereBetween('tanggal', [$dari, $sampai])->where('id_tipe_akun', 1)->sum('saldo_awal');
        $aktiva_tetap = DataAkun::whereBetween('tanggal', [$dari, $sampai])->where('id_tipe_akun', 2)->get();
        $aktiva_tetap_sum = DataAkun::whereBetween('tanggal', [$dari, $sampai])->where('id_tipe_akun', 2)->sum('saldo_awal');
        $utang = DataAkun::whereBetween('tanggal', [$dari, $sampai])->where('id_tipe_akun', 7)->get();
        $utang_sum = DataAkun::whereBetween('tanggal', [$dari, $sampai])->where('id_tipe_akun', 7)->sum('saldo_awal');
        $utang_lancar = DataAkun::whereBetween('tanggal', [$dari, $sampai])->where('id_tipe_akun', 3)->get();
        $utang_lancar_sum = DataAkun::whereBetween('tanggal', [$dari, $sampai])->where('id_tipe_akun', 3)->sum('saldo_awal');
        $modal = DataAkun::whereBetween('tanggal', [$dari, $sampai])->where('id_tipe_akun', 4)->get();
        $modal_sum = DataAkun::whereBetween('tanggal', [$dari, $sampai])->where('id_tipe_akun', 4)->sum('saldo_awal');

        $total_aktiva = $aktiva_lancar_sum + $aktiva_tetap_sum;
        $total_pasiva = ($utang_lancar_sum + $utang_sum) + $modal_sum;

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('export.neraca', compact('aktiva_lancar', 'aktiva_tetap', 'aktiva_lancar_sum', 'aktiva_tetap_sum', 'utang', 'utang_sum', 'utang_lancar', 'utang_lancar_sum', 'modal', 'modal_sum', 'total_aktiva', 'total_pasiva', 'dari', 'sampai'))->setPaper('a4', 'potrait')->setWarnings(false);
        return $pdf->stream('Laporan-Neraca', '.pdf');
    }
}
