@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Edit Data Kategori</h1>
</div>

<div class="section-body">
  <div class="card">
    <form method="POST" action="{{ route('data-kategori.update', $datas->id) }}">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label>Id Kategori</label>
          <input type="text" disabled value="{{ $datas->id_kategori }}" class="form-control @error('id_kategori') is-invalid @enderror" name="id_kategori" required>
          @error('id_kategori')
          <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Nama Kategori</label>
          <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" value="{{ $datas->nama_kategori }}" name="nama_kategori" required>
          @error('nama_kategori')
          <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Harga Satuan</label>
          <input type="number" class="form-control @error('harga_satuan') is-invalid @enderror" value="{{ $datas->harga_satuan }}" name="harga_satuan" required>
          @error('harga_satuan')
          <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('data-kategori.index') }}" type="button" class="btn btn-danger">Batal</a>
      </div>
    </form>
  </div>
</div>
@endsection