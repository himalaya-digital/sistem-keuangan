@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Penyusutan</h1>
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
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th>ID Penyusutan</th>
                  <th>Tanggal</th>
                  <th>Nama Aset</th>
                  <th>Nama Akun</th>
                  <th>Biaya</th>
                  <th>Penyusutan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($datas as $data)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $data->id }}</td>
                  <td>{{ date( 'd/m/Y', strtotime($data->tanggal_akuisisi)) }}</td>
                  <td>{{ $data->nama_aset }}</td>
                  <td>{{ $data->dataakun->nama_akun }}</td>
                  <td>{{ number_format($data->biaya_akuisisi, 0, ',', '.') }}</td>
                  <td>{{ number_format($data->penyusutan, 0, ',', '.') }}</td>
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