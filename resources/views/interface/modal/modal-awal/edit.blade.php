@extends('layouts.app')

@section('content')
<div class="section-header">
    <h1>Ubah Modal Awal</h1>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form method="POST" action="{{ route('modal-awal.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Jumlah Modal Awal</label>
                            <input type="number" min="0" value="{{ $data->jumlah }}" class="form-control" name="jumlah" required>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('modal-awal.index') }}" type="button" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
