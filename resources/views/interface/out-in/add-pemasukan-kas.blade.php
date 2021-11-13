@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Tambah Data Pemasukan Kas</h1>
</div>

<div class="section-body">
  <div class="card">
    <form method="POST" action="{{ route('pemasukan-kas.store') }}">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Nama Akun</label>
          <select name="id_akun" id="id_akun" class="custom-select">
            <option value="none" disabled selected>- Nama Akun -</option>
            @foreach($akuns as $akun)
            <option value="{{$akun->id}}">{{$akun->nama_akun}}</option>
            @endforeach
          </select>
        </div>
        {{-- <div class="form-group">
          <label>Nama Customer</label>
          <select name="id_proyek" id="id_proyek" class="custom-select">
            <option value="none" disabled selected>- Nama Customer -</option>
            @foreach($proyeks as $proyek)
            <option value="{{ $proyek->id_customer }}">{{$proyek->customer->nama_customer}}</option>
            @endforeach
          </select>
        </div> --}}
        <div class="form-group">
          <label>Tanggal</label>
          <input type="date" class="form-control" name="tanggal_pemasukan" required>
        </div>
        <div class="form-group">
          <label>Jumlah</label>
          <input type="number" class="form-control" name="jumlah_pemasukan" required>
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