@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Edit Data Aset</h1>
</div>

<div class="section-body">
  <div class="card">
    <form method="POST" action="{{ route('aset-aktif.update', $asets->id) }}">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label>ID Aset</label>
          <input disabled type="text" class="form-control" name="id" value="{{ $asets->id }}" required>
        </div>
        <div class="form-group">
          <label>Nama Aset</label>
          <input type="text" value="{{ $asets->nama_aset }}"
            class="form-control @error('nama_aset') is-invalid @enderror" name="nama_aset" required>
          @error('nama_aset')
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
            <option value="{{ $akun->id }}" @if($akun->nama_akun) selected
              @endif>{{ $akun->nama_akun }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Biaya Akuisisi</label>
          <input type="number" class="form-control" name="biaya_akuisisi" value="{{ $asets->biaya_akuisisi }}" required>
        </div>
        <div class="form-group">
          <label>Nilai Residu</label>
          <input type="number" class="form-control" name="nilai_residu" value="{{ $asets->nilai_residu }}" required>
        </div>
        <div class="form-group">
          <label>Masa Manfaat <span style="color: #ff990d">(*dalam tahun)</span></label>
          <input type="number" class="form-control" name="masa_manfaat" value="{{ $asets->masa_manfaat }}" required>
        </div>
        <div class="form-group">
          <label>Tanggal Akuisisi</label>
          <input type="date" class="form-control" name="tanggal_akuisisi" value="{{ $asets->tanggal_akuisisi }}"
            required>
        </div>
      </div>
      <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('aset-aktif.index') }}" type="button" class="btn btn-danger">Batal</a>
      </div>
    </form>
  </div>
</div>
@endsection