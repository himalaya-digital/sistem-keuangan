@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Detail Data Proyek</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <table class="table">
                <tbody>
                  <tr>
                    <th>ID Proyek</th>
                    <td>{{$project->id_proyek}}</td>
                  </tr>
                  <tr>
                    <th>Tanggal Mulai</th>
                    <td>{{$project->tanggal_mulai}}</td>
                  </tr>
                  <tr>
                    <th>Tanggal Selesai</th>
                    <td>{{$project->tanggal_selesai}}</td>
                  </tr>
                  <tr>
                    <th>Tanggal Pembayaran</th>
                    <td>{{$project->tanggal_bayar}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-12 col-sm-6">
              <table class="table">
                <tbody>
                  <tr>
                    <th>Nama Customer</th>
                    <td>{{$project->customer->nama_customer}}</td>
                  </tr>
                  <tr>
                    <th>Nama Proyek</th>
                    <td>{{$project->nama_proyek}}</td>
                  </tr>
                  <tr>
                    <th>Status</th>
                    <td>{{$project->status}}</td>
                  </tr>
                  <tr>
                    <th>Keterangan Pembayaran</th>
                    <td>{{$project->keterangan_bayar}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($project->bahans as $bahan)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$bahan->kategori->nama_kategori}}</td>
                    <td>{{$bahan->jumlah}}</td>
                    <td>{{$bahan->harga_satuan}}</td>
                    <td>{{$bahan->total}}</td>
                  </tr>
                  @endforeach

                  <tr>
                    <th colspan="4" style="text-align: right;">Total</th>
                    <td>{{$project->harga_total_bahan}}</td>
                  </tr>
                  <tr>
                    <th colspan="4" style="text-align: right;">Harga Jasa</th>
                    <td>{{$project->harga_jasa}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
              <table class="table">
                <tbody>
                  <tr>
                    <th>Total Bayar</th>
                    <td>{{$project->total_bayar}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
              <table class="table">
                <tbody>
                  <tr>
                    <th>Bayar</th>
                    <td>{{$project->bayar}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
              <table class="table">
                <tbody>
                  <tr>
                    <th>Sisa Bayar</th>
                    <td>{{$project->sisa_bayar}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection