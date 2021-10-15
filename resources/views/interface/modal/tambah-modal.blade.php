@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Tambah Modal</h1>
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
        <div class="card-body">
          <a href="{{ route('tambah-modal.create') }}" type="button" class="btn btn-primary float-right mb-3"
            title="edit">Tambah Data</a>
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th>Tanggal</th>
                  <th>Penambahan Modal</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($modals as $modal)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ date( 'd/m/Y', strtotime($modal->tanggal_penambahan)) }}</td>
                  <td>{{ number_format($modal->penambahan, 0, ',', '.') }}</td>
                  <td>
                    <a href="{{ route('tambah-modal.edit', $modal->id) }}" class="btn btn-warning" title="edit"><i
                        class="far fa-edit"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection