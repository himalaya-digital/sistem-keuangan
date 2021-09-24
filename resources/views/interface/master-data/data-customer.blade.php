@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Data Customer</h1>
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
          <a href="{{route('data-customer.create')}}" type="button" class="btn btn-primary float-right mb-3" title="add">Tambah Data</a>
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th>ID Customer</th>
                  <th>Nama Customer</th>
                  <th>No Telpon</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($datas as $data)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$data->id_customer}}</td>
                  <td>{{$data->nama_customer}}</td>
                  <td>{{$data->no_telpon}}</td>
                  <td>{{$data->alamat}}</td>
                  <td>
                    <a href="#" class="btn btn-warning" title="edit"><i class="far fa-edit"></i></a>
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