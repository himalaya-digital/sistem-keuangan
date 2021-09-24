@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Tambah Data Customer</h1>
</div>

<div class="section-body">
  <div class="card">
    <form method="POST" action="{{ route('data-customer.store') }}">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label>ID Customer</label>
          <input type="text" class="form-control @error('id_customer') is-invalid @enderror" name="id_customer" value="{{old('id_customer')}}" required>
          @error('id_customer')
          <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Nama Customer</label>
          <input type="text" class="form-control @error('nama_customer') is-invalid @enderror" name="nama_customer" value="{{ old('nama_customer') }}" required>
          @error('nama_customer')
          <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label>No. Telpon</label>
          <input type="text" class="form-control @error('no_telpon') is-invalid @enderror" name="no_telpon" value="{{ old('no_telpon') }}" required>
          @error('no_telpon')
          <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required>
        </div>
      </div>
      <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('data-customer.index') }}" type="button" class="btn btn-danger">Batal</a>
      </div>
    </form>
  </div>
</div>
@endsection