@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Riwayat Pembayaran</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Pembayaran</th>
                  <th>ID Proyek</th>
                  <th>Nama Customer</th>
                  <th>Nama Proyek</th>
                  <th>Total Bayar</th>
                  <th>Bayar</th>
                  <th>Sisa Bayar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>{{$project->tanggal_bayar}}</td>
                  <td>{{$project->id_proyek}}</td>
                  <td>{{$project->customer->nama_customer}}</td>
                  <td>{{$project->nama_proyek}}</td>
                  <td>{{$project->total_bayar}}</td>
                  <td>{{$project->bayar}}</td>
                  <td>{{$project->sisa_bayar}}</td>
                  <td>
                    <a href="#" class="btn btn-link btn-sm" title="print"><i class="fas fa-print"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection