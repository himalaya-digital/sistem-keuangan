@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Tambah Modal</h1>
</div>

<div class="section-body">
  <div class="card">
    <form method="POST" action="{{ route('tambah-modal.store') }}">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Jumlah Nominal</label>
          <input type="number" min="0" value="{{ old('penambahan') }}" class="form-control" name="penambahan" required>
        </div>
        <div class="form-group">
          <label>Tanggal Penambahan</label>
          <input type="date" class="form-control" name="tanggal_penambahan" value="{{ old('tanggal_penambahan') }}"
            required>
        </div>
      </div>
      <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('tambah-modal.index') }}" type="button" class="btn btn-danger">Batal</a>
      </div>
    </form>
  </div>
</div>
@endsection