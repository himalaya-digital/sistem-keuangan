@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Data Pengeluaran Kas</h1>
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
          <a href="{{ route('pengeluaran-kas.create') }}" type="button" class="btn btn-primary float-right mb-3">Tambah
            Data</a>
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th>Id Pengeluaran</th>
                  <th>Nama Akun</th>
                  <th>Nama Proyek</th>
                  <th>Kategori</th>
                  <th>Jumlah</th>
                  <th>Harga Satuan</th>
                  <th>Total Pengeluaran</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pengeluarans as $pengeluaran)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $pengeluaran->id_pengeluaran_kas }}</td>
                  <td>{{ $pengeluaran->dataakun->nama_akun }}</td>
                  <td>{{ $pengeluaran->proyek->nama_proyek }}</td>
                  <td>{{ $pengeluaran->id_kategori == null ? 'paket proyek' : $pengeluaran->kategori->nama_kategori}}
                  </td>
                  <td>{{ $pengeluaran->id_kategori == null ? '1 paket' : $pengeluaran->jumlah}}</td>
                  <td>
                    {{ $pengeluaran->id_kategori == null ? '-' : number_format($pengeluaran->kategori->harga_satuan, 0, ',', '.') }}
                  </td>
                  <td>{{ number_format($pengeluaran->proyek->harga_total_bahan, 0, ',', '.') }}</td>
                  <td>
                    <a href="#" class="btn btn-sm btn-warning" title="edit"><i class="far fa-edit"></i></a>
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