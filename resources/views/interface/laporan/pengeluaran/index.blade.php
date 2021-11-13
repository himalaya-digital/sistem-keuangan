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
  <h1>Laporan Pengeluaran Kas</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <form action="{{ route('laporan-pengeluaran.result') }}" method="GET">
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

      @if (isset($pengeluarans))
      <div class="card">
        <div class="row py-3">
          <div class="col-12 text-center">
            <div class="header-menus">
              <h4>PT. SAPUTRA TIRTHA AMERTHA</h4>
              <form action="{{ route('pengeluaran.pdf') }}" method="POST">
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
                <th scope="col">Tanggal</th>
                <th scope="col">Nama Akun</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pengeluarans as $pengeluaran)
              <tr>
                <th scope="row">{{ date( 'd/m/Y', strtotime($pengeluaran->tanggal_pengeluaran)) }}</th>
                <td>{{ $pengeluaran->dataakun->nama_akun }}</td>
                <td>{{ $pengeluaran->jumlah }}</td>
                <td>{{ $pengeluaran->keterangan_pengeluaran }}</td>
                <td>{{ number_format($pengeluaran->total_pengeluaran, 0, ',', '.') }}</td>
              </tr>
              @endforeach
              <tr>
                <th colspan="4">Total</th>
                <td>{{ number_format($total, 0, ',', '.') }}</td>
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