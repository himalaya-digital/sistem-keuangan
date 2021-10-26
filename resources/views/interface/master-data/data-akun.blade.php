@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Data Akun</h1>
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
          <a href="{{ route('data-akun.create') }}" type="button" class="btn btn-primary float-right mb-3"
            title="edit">Tambah Data</a>
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th>Kode Akun</th>
                  <th>Nama Akun</th>
                  <th>Tipe Akun</th>
                  <th>Saldo</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($datas as $data)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $data->kode_akun }}</td>
                  <td>{{ $data->nama_akun }}</td>
                  <td>{{ $data->tipeakun->tipe_akun }}</td>
                  <td>{{ number_format($data->saldo_awal, 0, ',', '.') }}</td>
                  <td>
                    <a href="{{ route('data-akun.edit', $data->id) }}" class="btn btn-warning" title="edit"><i
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