@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Edit Data Pengeluaran Kas</h1>
</div>

<div class="section-body">
  <div class="card">
    <form method="POST" action="{{ route('pengeluaran-kas.update', $pengeluarans->id) }}">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label>ID Pengeluaran Kas</label>
          <input disabled type="text" class="form-control" name="id" value="{{ $pengeluarans->id }}" required>
        </div>
        <div class="form-group">
          <label>Nama Akun</label>
          <select name="id_akun" id="id_akun" class="custom-select">
            <option value="none" disabled selected>- Nama Akun -</option>
            @foreach($akuns as $akun)
            <option value="{{$akun->id}}" @if($akun->nama_akun) selected @endif>{{$akun->nama_akun}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Jenis Pengeluaran</label>
          <select name="jenis_pengeluaran" id="seeAnotherField" class="custom-select">
            <option value="none" disabled selected>- Jenis Pengeluaran -</option>
            <option value="proyek" @if($pengeluarans->jenis_pengeluaran == 'proyek') selected @endif>Proyek</option>
            <option value="nonproyek" @if($pengeluarans->jenis_pengeluaran == 'nonproyek') selected @endif>Non Proyek
            </option>
          </select>
        </div>

        <div class="form-group kategoriFieldDiv">
          <label>Kategori</label>
          <select name="id_kategori" id="id_kategori" class="custom-select">
            <option value="none" disabled selected>- Kategori -</option>
            @foreach($kategories as $kategori)
            <option value="{{ $kategori->id }}" @if($pengeluarans->id_kategori == null) @else selected
              @endif>{{$kategori->nama_kategori}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group" id="otherFieldDiv">
          <label>Nama Proyek</label>
          <select name="id_proyek" id="id_proyek" class="custom-select">
            <option value="none" disabled selected>- Nama Proyek -</option>
            @foreach($proyeks as $proyek)
            <option value="{{ $proyek->id }}" @if($pengeluarans->id_proyek == null) @else selected
              @endif>{{ $proyek->nama_proyek }}
            </option>
            @endforeach
          </select>
        </div>

        <div class="form-group kategoriFieldDiv">
          <label>Jumlah</label>
          <input type="number" value="{{$pengeluarans->jumlah}}" class="form-control" name="jumlah">
        </div>

        <div class="form-group">
          <label>Tanggal</label>
          <input type="date" class="form-control" value="{{ $pengeluarans->tanggal_pengeluaran }}"
            name="tanggal_pengeluaran" required>
        </div>
        <div class="form-group">
          <label>Keterangan Pengeluaran</label>
          <textarea class="form-control @error('keterangan_pengeluaran') is-invalid @enderror"
            name="keterangan_pengeluaran" required>{{ $pengeluarans->keterangan_pengeluaran }}</textarea>
          @error('keterangan_pengeluaran')
          <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pengeluaran-kas.index') }}" type="button" class="btn btn-danger">Batal</a>
      </div>
    </form>
  </div>
</div>
@endsection

@section('custom-js')
<script>
  $("#seeAnotherField").change(function() {
    if ($(this).val() == "proyek") {
      $('#otherFieldDiv').show();
    } else {
      $('#otherFieldDiv').hide();
    }

    if ($(this).val() == "nonproyek") {
      $('.kategoriFieldDiv').show();
    } else {
      $('.kategoriFieldDiv').hide();
    }
  });
  $("#seeAnotherField").trigger("change");
</script>
@endsection