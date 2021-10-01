@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Tambah Data Pengeluaran Kas</h1>
</div>

<div class="section-body">
  <div class="card">
    <form method="POST" action="{{ route('pengeluaran-kas.store') }}">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label>ID Pengeluaran Kas</label>
          <input type="text" class="form-control @error('id_pengeluaran_kas') is-invalid @enderror"
            name="id_pengeluaran_kas" value="{{old('id_pengeluaran_kas')}}" required>
          @error('id_pengeluaran_kas')
          <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Nama Akun</label>
          <select name="id_akun" id="id_akun" class="custom-select">
            <option value="none" disabled selected>- Nama Akun -</option>
            @foreach($akuns as $akun)
            <option value="{{$akun->id}}">{{$akun->nama_akun}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Kategori</label>
          <select name="id_proyek" id="id_proyek" class="custom-select">
            <option value="none" disabled selected>- Kategori -</option>
            @foreach($proyeks as $proyek)
            <option value="{{ $proyek->id_kategori }}">{{$proyek->kategori->nama_kategori}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Tanggal</label>
          <input type="date" class="form-control" name="tanggal_pemasukan" required>
        </div>
        <div class="form-group">
          <label>Keterangan Pemasukan</label>
          <textarea class="form-control @error('keterangan_pemasukan') is-invalid @enderror" name="keterangan_pemasukan"
            required>{{old('keterangan_pemasukan')}}</textarea>
          @error('keterangan_pemasukan')
          <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pemasukan-kas.index') }}" type="button" class="btn btn-danger">Batal</a>
      </div>
    </form>
  </div>
</div>
@endsection