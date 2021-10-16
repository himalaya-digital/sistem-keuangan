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
  <h1>Perubahan Modal</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <form action="{{ route('laporan-perubahan-modal.result') }}" method="GET">
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
              <form action="{{ route('laporan-perubahan-modal.pdf') }}" method="POST">
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
            <tbody>
              <tr>
                <td>Modal Awal</td>
                <td>{{ number_format($modalawal, 0, ',', '.') }}</td>
              </tr>
              <tr>
                <td>Laba Bersih</td>
                <td>{{ number_format($totalpemasukan - $total, 0, ',', '.') }}</td>
              </tr>
              <tr>
                <td>Prive Pemilik</td>
                <td>{{ number_format($prive, 0, ',', '.') }}</td>
              </tr>
              <tr>
                <td>Penambahan Modal</td>
                <td>{{ number_format($tambahanmodal, 0, ',', '.') }}</td>
              </tr>
              <tr>
                <th>Modal Akhir</th>
                <th>
                  @php
                  $laba = $totalpemasukan - $total;
                  @endphp
                  {{ number_format($modalawal + $laba + $tambahanmodal - $prive, 0, ',', '.') }}
                </th>
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