@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Tambah Pelunasan Proyek</h1>
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
      @if(session('failed'))
      <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>×</span>
          </button>
          {{session('failed')}}
        </div>
      </div>
      @endif
      <form action="{{route('pelunasan-proyek.store', ['id_proyek' => $project->id])}}" method="POST">
        @csrf
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group row">
                  <label for="id-pelunasan-proyek" class="col-sm-3 col-form-label">ID Pelunasan Proyek</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="id-pelunasan-proyek" name="id_pelunasan_proyek" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="id-proyek" class="col-sm-3 col-form-label">ID Proyek</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="id-proyek" name="id_proyek" readonly value="{{$project->id}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama-customer" class="col-sm-3 col-form-label">Nama Customer</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama-customer" name="nama_customer" readonly value="{{$project->customer->nama_customer}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama-proyek" class="col-sm-3 col-form-label">Nama Proyek</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama-proyek" name="nama_proyek" readonly value="{{$project->nama_proyek}}">
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 col-sm-3">
                <div class="form-group">
                  <label for="tanggal-pembayaran">Tanggal Pembayaran</label>
                  <input type="date" class="form-control datepicker" id="tanggal-pembayaran" name="tanggal_pembayaran" required>
                </div>
              </div>

              <div class="col-12 col-sm-3">
                <div class="form-group">
                  <label for="jumlah-bayar-piutang">Jumlah Bayar Piutang</label>
                  <input type="number" class="form-control" id="jumlah-bayar-piutang" name="jumlah_bayar_piutang" required>
                </div>
              </div>

              <div class="col-12 col-sm-3">
                <div class="form-group">
                  <label for="sisa-piutang">Sisa Piutang</label>
                  <input type="number" class="form-control" id="sisa-piutang" name="sisa_piutang" disabled value="{{$project->sisa_bayar}}">
                </div>
              </div>

              <div class="col-12 col-sm-3 align-self-center">
                <button type="submit" class="btn btn-icon icon-left btn-primary" id="tambah-data-btn">
                  <i class="fa fa-plus-square"></i>
                  Tambah Data
                </button>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table class="table table-striped table-md">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal Bayar</th>
                        <th>Jumlah Bayar</th>
                        <th>Sisa Piutang</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($settlements as $s)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$s->tanggal_pembayaran}}</td>
                        <td>{{$s->jumlah_bayar}}</td>
                        <td>{{$s->sisa_piutang}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="card-footer">
            <a href="{{route('data-proyek.index')}}" class="btn btn-primary mr-3" id="simpan-btn">
              Simpan
            </a>
            <a href="{{route('data-proyek.index')}}" class="btn btn-light">
              Batal
            </a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('js-libraries')
<script src="{{asset('stisla/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
@endsection