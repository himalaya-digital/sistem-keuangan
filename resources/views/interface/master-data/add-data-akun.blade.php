@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Tambah Data Akun</h1>
</div>

<div class="section-body">
  <div class="card">
    <form method="POST" action="{{ route('data-akun.store') }}">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Kode Akun</label>
          <input type="text" value="{{ old('kode_akun') }}"
            class="form-control @error('kode_akun') is-invalid @enderror" name="kode_akun" required>
          @error('kode_akun')
          <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Nama Akun</label>
          <input type="text" class="form-control @error('nama_akun') is-invalid @enderror" name="nama_akun"
            value="{{ old('nama_akun') }}" required>
          @error('nama_akun')
          <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Klasifikasi Akun</label>
          <select name="id_tipe_akun" id="id_tipe_akun" class="custom-select" required>
            <option value="none" disabled selected>- Pilih Klasifikasi Akun -</option>
            @foreach ($types as $tipe)
            <option value="{{ $tipe->id }}">{{ $tipe->tipe_akun }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Saldo Awal</label>
          <input type="number" class="form-control" name="saldo_awal" value="{{ old('saldo_awal') }}">
        </div>
      </div>
      <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('data-akun.index') }}" type="button" class="btn btn-danger">Batal</a>
      </div>
    </form>
  </div>
</div>
@endsection