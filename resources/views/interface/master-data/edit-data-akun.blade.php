@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Edit Data Akun</h1>
</div>

<div class="section-body">
  <div class="card">
    <form method="POST" action="{{ route('data-akun.update', $datas->id) }}">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label>Kode Akun</label>
          <input type="text" value="{{ $datas->kode_akun }}"
            class="form-control @error('kode_akun') is-invalid @enderror" name="kode_akun" required>
          @error('kode_akun')
          <span class="invalid-feedback" role="alert">
            <strong>kode akun sudah ada</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Nama Akun</label>
          <input type="text" class="form-control" value="{{ $datas->nama_akun }}" name="nama_akun" required>
        </div>
        <div class="form-group">
          <label>Tipe Akun</label>
          <input type="text" class="form-control" value="{{ $datas->tipe_akun }}" name="tipe_akun" required>
        </div>
      </div>
      <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('data-akun.index') }}" type="button" class="btn btn-danger">Batal</a>
      </div>
    </form>
  </div>
</div>
@endsection