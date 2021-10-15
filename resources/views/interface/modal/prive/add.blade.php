@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Tambah Prive</h1>
</div>

<div class="section-body">
  <div class="card">
    <form method="POST" action="{{ route('prive.store') }}">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Nominal</label>
          <input type="number" min="0" value="{{ old('jumlah') }}" class="form-control" name="jumlah" required>
        </div>
        <div class="form-group">
          <label>Tanggal Penambahan</label>
          <input type="date" class="form-control" name="tanggal_prive" value="{{ old('tanggal_prive') }}" required>
        </div>
      </div>
      <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('prive.index') }}" type="button" class="btn btn-danger">Batal</a>
      </div>
    </form>
  </div>
</div>
@endsection