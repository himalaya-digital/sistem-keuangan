@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Tutup Buku</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      @if(session('success'))
      <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>×</span>
          </button>
          {{session('success')}}
        </div>
      </div>
      @endif
      <div class="card">
        <form action="{{ route('jurnal.result') }}" method="GET">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <label for="dari">Dari Tanggal</label>
                <input type="date" id="dari" name="dari" class="form-control" required>
              </div>
              <div class="col-12 mt-4">
                <label for="sampai">Sampai Tanggal</label>
                <input type="date" id="sampai" name="sampai" class="form-control" required>
              </div>
            </div>
            <div class="mt-3 d-flex justify-content-center">
              <button type="submit" class="btn btn-lg btn-primary">Proses Tutup Buku</button>
            </div>
          </div>
        </form>
      </div>

      {{-- @if (isset($results))
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>ID Jurnal</th>
                  <th>Deskripsi</th>
                  <th>ID Akun</th>
                  <th>Nama Akun</th>
                  <th>Ref</th>
                  <th>Debit</th>
                  <th>Kredit</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($results as $result)
                <tr>
                  <td>{{ date( 'd/m/Y', strtotime($result->tanggal_akuisisi)) }}</td>
      <td>{{ $result->id }}</td>
      <td>{{ $result->deskripsi }}</td>
      <td>{{ $result->id_akun }}</td>
      <td>
        <p>{{ $result->dataakun->nama_akun }}</p>
        <p>Kas</p>
      </td>
      <td>-</td>
      <td>
        <p>{{ number_format($result->penyusutan, 0, ',', '.') }}</p>
        <p>-</p>
      </td>
      <td>
        <p>-</p>
        <p>{{ number_format($result->penyusutan, 0, ',', '.') }}</p>
      </td>
      </tr>
      @endforeach
      </tbody>
      </table>
    </div>
  </div>
</div>
@endif --}}

</div>
</div>
</div>
@endsection