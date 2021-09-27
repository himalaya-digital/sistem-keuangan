@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Data Proyek</h1>
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
          <a href="{{route('data-proyek.create')}}" type="button" class="btn btn-primary float-right mb-3" title="add">Tambah Data</a>
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th>ID Proyek</th>
                  <th>Nama Customer</th>
                  <th>Nama Proyek</th>
                  <th>Total Bayar</th>
                  <th>Bayar</th>
                  <th>Sisa Bayar</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>PRO-001</td>
                  <td>aji pandean</td>
                  <td>pemasangan ipal rsup sanglah</td>
                  <td>65.000.000</td>
                  <td>65.000.000</td>
                  <td>0</td>
                  <td>lunas</td>
                  <td>
                    <a href="#" class="btn btn-link btn-sm" title="edit"><i class="far fa-edit"></i></a>
                    <a href="#" class="btn btn-link btn-sm" title="edit"><i class="far fa-eye"></i></a>
                    <a href="#" class="btn btn-link btn-sm" title="edit"><i class="far fa-money-bill-alt"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection