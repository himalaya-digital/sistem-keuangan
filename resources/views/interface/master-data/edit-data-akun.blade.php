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
          <input type="text" disabled value="{{ $datas->kode_akun }}"
            class="form-control @error('kode_akun') is-invalid @enderror" name="kode_akun" required>
          @error('kode_akun')
          <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Nama Akun</label>
          <input type="text" class="form-control @error('nama_akun') is-invalid @enderror"
            value="{{ $datas->nama_akun }}" name="nama_akun" required>
          @error('nama_akun')
          <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Tipe Akun</label>
          <select name="tipe_akun" id="tipe_akun" class="custom-select">
            <option value="none" disabled selected>- Pilih Klasifikasi Akun -</option>
            @foreach ($types as $tipe)
            <option value="{{$tipe->id}}" @if($datas->id_tipe_akun == $tipe->id) selected @endif>{{$tipe->tipe_akun}}
            </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Saldo Awal</label>
          <input type="number" class="form-control" name="saldo_awal" value="{{ $datas->saldo_awal }}">
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