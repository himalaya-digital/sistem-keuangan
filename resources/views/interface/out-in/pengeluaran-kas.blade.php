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
                  <th>Id Pemasukan</th>
                  <th>Nama Akun</th>
                  <th>Kategori</th>
                  <th>Jumlah</th>
                  <th>Harga Satuan</th>
                  <th>Harga Beli</th>
                  <th>Total Bayar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                {{-- @foreach ($pemasukans as $pemasukan) --}}
                <tr>
                  <td>1</td>
                  <td>001</td>
                  <td>anjay</td>
                  <td>indro</td>
                  <td> 12/12/2021</td>
                  <td>anjay</td>
                  <td>20.000</td>
                  <td>20.000</td>
                  <td>
                    <a href="#" class="btn btn-sm btn-warning" title="edit"><i class="far fa-edit"></i></a>
                  </td>
                </tr>
                {{-- @endforeach --}}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection