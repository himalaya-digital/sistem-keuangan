@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Tutup Buku</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      @if(session('success'))
      <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>×</span>
          </button>
          {{session('success')}}
        </div>
      </div>
      @endif
      <div class="card">
        <form action="{{ route('tutup-buku.results') }}" method="GET">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <label for="dari">Dari Tanggal</label>
                <input type="date" id="dari" name="dari" class="form-control" required>
              </div>
              <div class="col-12 mt-4">
                <label for="sampai">Sampai Tanggal</label>
                <input type="date" id="sampai" name="sampai" class="form-control" required>
              </div>
            </div>
            <div class="mt-3 d-flex justify-content-center">
              <button type="submit" class="btn btn-lg btn-primary">Proses Tutup Buku</button>
            </div>
          </div>
        </form>
      </div>

      @if (isset($debits))
      <div class="row">
        <div class="col-6">
          <div class="card">
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>ID Akun</th>
                      <th>Nama Akun</th>
                      <th>Debit</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($debits as $debit)
                    <tr>
                      <td>{{ date( 'd/m/Y', strtotime($debit->tanggal_pemasukan)) }}</td>
                      <td>{{ $debit->id_akun }}</td>
                      <td>{{ $debit->dataakun->nama_akun }}</td>
                      <td>
                        {{ number_format($debit->dataproyek->total_bayar, 0, ',', '.') }}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="col-6">
          <div class="card">
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>ID Akun</th>
                      <th>Nama Akun</th>
                      <th>Kredit</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($kredits as $kredit)
                    <tr>
                      <td>{{ date( 'd/m/Y', strtotime($kredit->tanggal_pengeluaran)) }}</td>
                      <td>{{ $kredit->id_akun }}</td>
                      <td>{{ $kredit->dataakun->nama_akun }}</td>
                      <td>
                        {{ number_format($kredit->total_pengeluaran, 0, ',', '.')}}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif

    </div>
  </div>
</div>
@endsection