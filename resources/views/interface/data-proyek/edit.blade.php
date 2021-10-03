@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Edit Data Proyek</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <!-- id proyek -->
            <div class="col-12 col-sm-6">
              <div class="form-group row">
                <label for="id-proyek" class="col-sm-3 col-form-label">ID Proyek</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="id-proyek" name="id_proyek" value="{{$project->id_proyek}}" disabled>
                </div>
              </div>
            </div>

            <!-- nama customer -->
            <div class="col-12 col-sm-6">
              <div class="form-group row">
                <label for="nama-customer" class="col-sm-3 col-form-label">Nama Customer</label>
                <div class="col-sm-9">
                  <select id="id-customer" class="form-control selectric" name="id_customer">
                    <option value="0">-- Pilih customer --</option>
                    @foreach ($customers as $customer)
                    @if ($customer->id == $project->id_customer)
                    <option value="{{$customer->id}}" selected>{{$customer->nama_customer}}</option>
                    @else
                    <option value="{{$customer->id}}">{{$customer->nama_customer}}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <!-- tanggal mulai -->
            <div class="col-12 col-sm-6">
              <div class="form-group row">
                <label for="tanggal-mulai" class="col-sm-3 col-form-label">Tanggal Mulai</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control datepicker" id="tanggal-mulai" name="tanggal_mulai" value="{{$project->tanggal_mulai}}">
                </div>
              </div>
            </div>

            <!-- nama proyek -->
            <div class="col-12 col-sm-6">
              <div class="form-group row">
                <label for="nama-proyek" class="col-sm-3 col-form-label">Nama Proyek</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="nama-proyek" name="nama_proyek" value="{{$project->nama_proyek}}">
                </div>
              </div>
            </div>

            <!-- tanggal selesai -->
            <div class="col-12 col-sm-6">
              <div class="form-group row">
                <label for="tanggal-selesai" class="col-sm-3 col-form-label">Tanggal Selesai</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control datepicker" id="tanggal-selesai" name="tanggal_selesai" value="{{$project->tanggal_selesai}}">
                </div>
              </div>
            </div>

            <!-- keterangan pembayaran -->
            <div class="col-12 col-sm-6">
              <div class="form-group row">
                <label for="keterangan-pembayaran" class="col-sm-3 col-form-label">Keterangan Pembayaran</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="keterangan-pembayaran" name="keterangan_bayar" value="{{$project->keterangan_bayar}}">
                </div>
              </div>
            </div>

            <!-- tanggal pembayaran -->
            <div class="col-12 col-sm-6">
              <div class="form-group row">
                <label for="tanggal-pembayaran" class="col-sm-3 col-form-label">Tanggal Pembayaran</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control datepicker" id="tanggal-pembayaran" name="tanggal_bayar" value="{{$project->tanggal_bayar}}">
                </div>
              </div>
            </div>
          </div>

          <!-- kategori -->
          <form action="{{route('data-bahan.store', ['id_proyek' => $project->id])}}" method="POST">
            @csrf
            <div class="row">
              <div class="col-12 col-sm-2">
                <div class="form-group">
                  <label for="nama-kategori">Nama Kategori</label>
                  <select class="form-control selectric" id="nama-kategori" name="nama_kategori">
                    <option value="0,0">-- Pilih kategori --</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}},{{$category->nama_kategori}}">{{$category->nama_kategori}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-12 col-sm-2">
                <div class="form-group">
                  <label for="jumlah">Jumlah</label>
                  <input type="number" class="form-control" id="jumlah" min="1" name="jumlah">
                </div>
              </div>

              <div class="col-12 col-sm-2">
                <div class="form-group">
                  <label for="harga-satuan">Harga Satuan</label>
                  <input type="number" class="form-control" id="harga-satuan" min="1" name="harga_satuan" readonly value="0" data-kategori="{{$categories}}">
                </div>
              </div>

              <div class="col-12 col-sm-2">
                <div class="form-group">
                  <label for="total">Total</label>
                  <input type="number" class="form-control" readonly id="total" value="0" min="1" name="total">
                </div>
              </div>

              <div class="col-12 col-sm-2 align-self-center">
                <button type="submit" class="btn btn-icon icon-left btn-primary" id="tambah-data-btn">
                  <i class="fa fa-plus-square"></i>
                  Tambah Data
                </button>
              </div>
            </div>
          </form>

          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Kategori</th>
                      <th>Jumlah</th>
                      <th>Harga Satuan</th>
                      <th>Total</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id="tbody-kategori">
                    @foreach ($project->bahans as $bahan)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$bahan->kategori->nama_kategori}}</td>
                      <td>{{$bahan->jumlah}}</td>
                      <td>{{$bahan->harga_satuan}}</td>
                      <td>{{$bahan->total}}</td>
                      <td>
                        <form action="{{route('data-bahan.destroy', ['id_bahan' => $bahan->id, 'id_proyek' => $project->id])}}" method="post">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-link btn-sm" title="edit"><i class="fa fa-times"></i></button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-12 col-sm-4">
              <div class="form-group row">
                <label for="total-harga-bahan" class="col-sm-3 col-form-label">Total Harga Bahan</label>
                <div class="col-sm-9">
                  <input type="number" disabled class="form-control" id="total-harga-bahan" name="harga_total_bahan" value="{{$project->harga_total_bahan}}">
                </div>
              </div>
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-12 col-sm-4">
              <div class="form-group row">
                <label for="harga-jasa" class="col-sm-3 col-form-label">Harga Jasa</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="harga-jasa" name="harga_jasa" value="{{$project->harga_jasa}}">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-sm-2">
              <div class="form-group">
                <label for="total-bayar">Total Bayar</label>
                <input type="number" class="form-control" name="total_bayar" disabled id="total-bayar" min="1" value="{{$project->total_bayar}}">
              </div>
            </div>

            <div class="col-12 col-sm-2">
              <div class="form-group">
                <label for="bayar">Bayar</label>
                <input type="number" class="form-control" name="bayar" id="bayar" min="1" value="{{$project->bayar}}">
              </div>
            </div>

            <div class="col-12 col-sm-2">
              <div class="form-group">
                <label for="sisa-bayar">Sisa Bayar</label>
                <input type="number" class="form-control" name="sisa_bayar" disabled id="sisa-bayar" min="1" value="{{$project->sisa_bayar}}">
              </div>
            </div>

            <div class="col-12 col-sm-2 align-self-center">
              <button class="btn btn-primary" id="simpan-btn" data-update-route="{{route('data-proyek.update', $project->id)}}">
                Simpan
              </button>
              <a href="{{route('data-proyek.index')}}" class="btn btn-light">
                Batal
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('css-libraries')
<link rel="stylesheet" href="{{asset('stisla/modules/jquery-selectric/selectric.css')}}">
@endsection

@section('js-libraries')
<script src="{{asset('stisla/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('stisla/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
@endsection

@section('custom-js')
<script src="{{asset('js/data-proyek/edit.js')}}"></script>
@endsection