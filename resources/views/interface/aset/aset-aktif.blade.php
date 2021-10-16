@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Data Aset Aktif</h1>
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
          <a href="{{ route('aset-aktif.create') }}" type="button" class="btn btn-primary float-right mb-3"
            title="add">Tambah Data</a>
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th>ID Aset</th>
                  <th>Tanggal</th>
                  <th>Nama Aset</th>
                  <th>Nama Akun</th>
                  <th>Biaya</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($asets as $aset)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $aset->id }}</td>
                  <td>{{ date( 'd/m/Y', strtotime($aset->tanggal_akuisisi)) }}</td>
                  <td>{{ $aset->nama_aset }}</td>
                  <td>{{ $aset->dataakun->nama_akun }}</td>
                  <td>{{ number_format($aset->biaya_akuisisi, 0, ',', '.') }}</td>
                  <td>
                    <a href="{{ route('aset-aktif.edit', $aset->id) }}" class="btn btn-sm btn-warning" title="edit"><i
                        class="far fa-edit"></i></a>
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