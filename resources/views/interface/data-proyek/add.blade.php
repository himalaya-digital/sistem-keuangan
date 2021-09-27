@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Tambah Data Proyek</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="form-group row">
                <label for="id-proyek" class="col-sm-3 col-form-label">ID Proyek</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="id-proyek">
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="form-group row">
                <label for="nama-customer" class="col-sm-3 col-form-label">Nama Customer</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="nama-customer">
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="form-group row">
                <label for="id-proyek" class="col-sm-3 col-form-label">Tanggal Mulai</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="id-proyek">
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="form-group row">
                <label for="id-proyek" class="col-sm-3 col-form-label">Nama Proyek</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="id-proyek">
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="form-group row">
                <label for="id-proyek" class="col-sm-3 col-form-label">Tanggal Selesai</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="id-proyek">
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="form-group row">
                <label for="id-proyek" class="col-sm-3 col-form-label">Keterangan Pembayaran</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="id-proyek">
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="form-group row">
                <label for="id-proyek" class="col-sm-3 col-form-label">Tanggal Pembayaran</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="id-proyek">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-sm-2">
              <div class="form-group">
                <label for="nama-kategori">Nama Kategori</label>
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="col-12 col-sm-2">
              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="col-12 col-sm-2">
              <div class="form-group">
                <label for="harga-satuan">Harga Satuan</label>
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="col-12 col-sm-2">
              <div class="form-group">
                <label for="total">Total</label>
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="col-12 col-sm-2 align-self-center">
              <a href="#" class="btn btn-icon icon-left btn-primary">
                <i class="fa fa-plus-square"></i>
                Tambah Data
              </a>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <tbody>
                    <tr>
                      <th>No</th>
                      <th>Nama Kategori</th>
                      <th>Jumlah</th>
                      <th>Harga Satuan</th>
                      <th>Total</th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>pipa paralon 4 meter</td>
                      <td>2</td>
                      <td>80.000</td>
                      <td>160.000</td>
                      <td>
                        <a href="#" class="btn btn-link btn-sm" title="edit"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-12 col-sm-3">
              <div class="form-group row">
                <label for="total-harga" class="col-sm-3 col-form-label">Total</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="total-harga">
                </div>
              </div>
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-12 col-sm-3">
              <div class="form-group row">
                <label for="jasa" class="col-sm-3 col-form-label">Jasa</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="jasa">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-sm-2">
              <div class="form-group">
                <label for="total-bayar">Total Bayar</label>
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="col-12 col-sm-2">
              <div class="form-group">
                <label for="bayar">Bayar</label>
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="col-12 col-sm-2">
              <div class="form-group">
                <label for="sisa-bayar">Sisa Bayar</label>
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="col-12 col-sm-2 align-self-center">
              <a href="#" class="btn btn-primary">
                Simpan
              </a>
              <a href="#" class="btn btn-light">
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