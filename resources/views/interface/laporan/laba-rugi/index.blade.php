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
  <h1>Laporan Laba Rugi</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <form action="{{ route('laba-rugi.result') }}" method="GET">
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

      @if (isset($totalpemasukan))
      <div class="card">
        <div class="row py-3">
          <div class="col-12 text-center">
            <div class="header-menus">
              <h4>PT. SAPUTRA TIRTHA AMERTHA</h4>
              <form action="{{ route('laba-rugi.pdf') }}" method="POST">
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
                <th scope="col">Pendapatan</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Pendapatan Usaha</td>
                <td>{{ number_format($totalpemasukan, 0, ',', '.') }}</td>
              </tr>
            </tbody>
          </table>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">Beban</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pengeluarans as $pengeluaran)
              <tr>
                <td>
                  {{ $pengeluaran->dataakun->nama_akun }}
                </td>
                <td>
                  {{ number_format($pengeluaran->total_pengeluaran, 0, ',', '.') }}
                </td>
              </tr>
              @endforeach
              <tr>
                <th>Total</th>
                <td>
                  {{ number_format($totalpengeluaran, 0, ',', '.') }}
                </td>
              </tr>
            </tbody>
          </table>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">Laba</th>
                <th scope="col">{{ number_format($totalpemasukan - $totalpengeluaran, 0, ',', '.')}}</th>
              </tr>
            </thead>
          </table>
        </div>

      </div>
      @endif

    </div>
  </div>
</div>
@endsection