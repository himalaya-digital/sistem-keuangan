@extends('layouts.app')

@section('additional-css')
<style>
  .header-menus {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-left: 32%;
    padding-right: 2%;
  }
</style>
@endsection

@section('content')
<div class="section-header">
  <h1>Laporan Arus Kas</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <form action="{{ route('laporan-arus-kas.result') }}" method="GET">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-5">
                <input type="date" name="dari" class="form-control" required>
              </div>
              <div class="col-2 d-flex align-items-center justify-content-center">
                <p class="text-center mb-0">S / D</p>
              </div>
              <div class="col-5">
                <input type="date" name="sampai" class="form-control" required>
              </div>
            </div>
            <div class="mt-3 d-flex justify-content-center">
              <button type="submit" class="btn btn-lg btn-primary">Tampilkan</button>
            </div>
          </div>
        </form>
      </div>

      @if (isset($pemasukan))
      <div class="card">
        <div class="row py-3">
          <div class="col-12 text-center">
            <div class="header-menus">
              <h4>PT. SAPUTRA TIRTHA AMERTHA</h4>
              <form action="{{ route('lapran-arus-kas.pdf') }}" method="POST">
                @csrf
                <input hidden type="date" name="dari" value="{{$dari}}">
                <input hidden type="date" name="sampai" value="{{$sampai}}">

                <button type="submit" class="btn btn-icon btn-warning"><i class="fas fa-file-download"
                    style="font-size: 18px"></i></button>
              </form>
            </div>
            <h5>Jalan Kecumbung No. 38</h5>
          </div>
        </div>

        <div class="card-body p-0">
          <table class="table">
            <thead>
              <tr>
                <th colspan="2">Aktivitas Operasional</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Pendapatan</td>
                <td>{{ number_format($pemasukan, 0, ',', '.') }}</td>
              </tr>
              <tr>
                <td>Pengeluaran</td>
                <td>{{ number_format($pengeluaran, 0, ',', '.') }}</td>
              </tr>
              <tr>
                <td>Beban Proyek</td>
                <td>{{ number_format($beban, 0, ',', '.') }}</td>
              </tr>
              <tr>
                <th>Total</th>
                <th>{{ number_format($pemasukan - $pengeluaran - $beban, 0, ',', '.') }}</th>
              </tr>
            </tbody>
          </table>

          <table class="table">
            <thead>
              <tr>
                <th colspan="2">Aktivitas Investasi</th>
              </tr>
            </thead>
            <tbody>
              @if (isset($investasis))
              @foreach ($investasis as $investasi)
              <tr>
                <td>{{ $investasi->dataakun->nama_akun }}</td>
                <td>{{ number_format($investasi->total_pengeluaran, 0, ',', '.') }}</td>
              </tr>
              @endforeach
              @else
              -
              @endif
              <tr>
                <th>Total</th>
                @if (isset($investasitotal))
                <th>{{ number_format($investasitotal, 0, ',', '.') }}</th>
                @endif
              </tr>
            </tbody>
          </table>

          <table class="table">
            <thead>
              <tr>
                <th colspan="2">Aktivitas Pendanaan</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Saldo Kas Awal Periode</td>
                <td>
                  @if (isset($kas))
                  {{ number_format($kas, 0, ',', '.') }}
                  @else
                  -
                  @endif
                </td>
              </tr>
              <tr>
                <td>Prive</td>
                <td>
                  @if (isset($prive))
                  {{ number_format($prive, 0, ',', '.') }}
                  @endif
                </td>
              </tr>
              <tr>
                <td>Penambahan Modal</td>
                <td>
                  @if (isset($tambahanmodal))
                  {{ number_format($tambahanmodal, 0, ',', '.') }}
                  @endif
                </td>
              </tr>
              <tr>
                <td>Saldo Akhir Periode</td>
                @php
                $operasional = $pemasukan - $pengeluaran - $beban;
                $investasi = $investasitotal;
                $pendanaan = $prive;
                $penurunanKas = $operasional - $investasi - $pendanaan;
                $saldoAwal = $kas;
                if ($saldoAwal != 0) {
                $result = $saldoAwal - $penurunanKas + $tambahanmodal;
                }
                $result = $penurunanKas + $tambahanmodal;
                @endphp
                <td>{{ number_format($result, 0, ',', '.') }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      @endif

    </div>
  </div>
</div>
@endsection