@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Data Akun</h1>
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
          <a href="{{ route('data-akun.create') }}" type="button" class="btn btn-primary float-right mb-3"
            title="edit">Tambah Data</a>
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th>Kode Akun</th>
                  <th>Nama Akun</th>
                  <th>Tipe Akun</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($datas as $data)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $data->kode_akun }}</td>
                  <td>{{ $data->nama_akun }}</td>
                  <td>{{ $data->tipe_akun }}</td>
                  <td>
                    <a href="{{ route('data-akun.edit', $data->id) }}" class="btn btn-warning" title="edit"><i
                        class="far fa-edit"></i></a>
                    <button class="btn btn btn-danger" data-toggle="modal" data-target="#delete-modal{{ $data->id }}"><i
                        class="far fa-trash-alt"></i></button>
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

@section('modals')
@foreach($datas as $data)
<div class="modal fade" id="delete-modal{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Data</h5>
      </div>
      <div class="modal-body">
        <div>Yakin ingin menghapus <span class="font-weight-bold">Data</span>
          ini? 🥺
        </div>
      </div>
      <div class="modal-footer bg-whitesmoke">
        <button class="btn btn-light" data-dismiss="modal">Tidak</button>
        <form method="POST" action="{{ route('data-akun.destroy', $data->id) }}">
          @method('DELETE')
          @csrf
          <button type="submit" class="btn btn-danger">Ya, hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection