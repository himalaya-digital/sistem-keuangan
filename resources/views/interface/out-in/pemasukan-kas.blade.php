@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Data Pemasukan Kas</h1>
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
        <div class="card-body">
          <a href="{{ route('pemasukan-kas.create') }}" type="button" class="btn btn-primary float-right mb-3">Tambah
            Data</a>
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th>Id Pemasukan</th>
                  <th>Nama Akun</th>
                  <th>Nama Customer</th>
                  <th>Tanggal</th>
                  <th>Keterangan</th>
                  <th>Total Pemasukan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pemasukans as $pemasukan)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $pemasukan->id_pemasukan_kas }}</td>
                  <td>{{ $pemasukan->dataakun->nama_akun }}</td>
                  <td>{{ $pemasukan->dataproyek->customer->nama_customer }}</td>
                  <td> {{ date( 'd/m/Y', strtotime($pemasukan->tanggal_pemasukan)) }}</td>
                  <td>{{ $pemasukan->keterangan_pemasukan }}</td>
                  <td>{{ number_format($pemasukan->total_pemasukan, 0, ',', '.') }}</td>
                  <td>
                    <a href="{{ route('pemasukan-kas.edit', $pemasukan->id) }}" class="btn btn-sm btn-warning"
                      title="edit"><i class="far fa-edit"></i></a>
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
</div>
@endsection