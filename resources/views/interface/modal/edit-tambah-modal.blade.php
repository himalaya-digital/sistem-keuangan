@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Edit Modal</h1>
</div>

<div class="section-body">
  <div class="card">
    <form method="POST" action="{{ route('tambah-modal.update', $data->id) }}">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label>Jumlah Nominal</label>
          <input type="number" min="0" value="{{ $data->penambahan }}" class="form-control" name="penambahan" required>
        </div>
        <div class="form-group">
          <label>Tanggal Penambahan</label>
          <input type="date" class="form-control" name="tanggal_penambahan" value="{{ $data->tanggal_penambahan }}"
            required>
        </div>
      </div>
      <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('tambah-modal.index') }}" type="button" class="btn btn-danger">Batal</a>
      </div>
    </form>
  </div>
</div>
@endsection