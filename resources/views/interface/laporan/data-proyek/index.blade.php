@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Laporan Data Proyek</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <form action="{{route('laporan-data-proyek.index')}}">
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-sm-3 col-md-4">
                <div class="form-group">
                  <label for="nama-customer">Nama Customer</label>
                  <select class="form-control" id="nama-customer" name="nama_customer">
                    <option>-- Pilih customer --</option>
                    @foreach ($customers as $c)
                    <option value="{{$c->id}}">{{$c->nama_customer}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-12 col-sm-3 col-md-4">
                <div class="form-group">
                  <label for="nama-proyek">Nama Proyek</label>
                  <select class="form-control" id="nama-proyek" name="nama_proyek">
                    <option>-- Pilih proyek --</option>
                    @foreach ($projects as $p)
                    <option value="{{$p->id}}">{{$p->nama_proyek}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-12 col-sm-3 col-md-4 align-self-center">
                <button type="submit" class="btn btn-primary" id="tampilkan-btn">
                  Tampilkan Data
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      @if (is_null($selected))
      <p>Data kosong</p>
      @else
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-12 text-center">
              <h4>PT. SAPUTRA TIRTHA AMERTHA</h4>
              <h5>Jalan Kecumbung No. 38</h5>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-sm-6">
              <table class="table">
                <tr>
                  <th>ID Proyek</th>
                  <td>{{$selected->id_proyek}}</td>
                </tr>
                <tr>
                  <th>Nama Proyek</th>
                  <td>{{$selected->nama_proyek}}</td>
                </tr>
                <tr>
                  <th>Tanggal Mulai</th>
                  <td>{{$selected->tanggal_mulai}}</td>
                </tr>
              </table>
            </div>
            <div class="col-12 col-sm-6">
              <table class="table">
                <tr>
                  <th>Nama Customer</th>
                  <td>{{$selected->customer->nama_customer}}</td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td>{{$selected->customer->alamat}}</td>
                </tr>
                <tr>
                  <th>Nomor Telepon</th>
                  <td>{{$selected->customer->no_telpon}}</td>
                </tr>
                <tr>
                  <th>Tanggal Selesai</th>
                  <td>{{$selected->tanggal_selesai}}</td>
                </tr>
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
                  @foreach ($selected->bahans as $b)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$b->kategori->nama_kategori}}</td>
                    <td>{{$b->jumlah}}</td>
                    <td>{{$b->kategori->harga_satuan}}</td>
                    <td>{{$b->total}}</td>
                  </tr>
                  @endforeach
                  <tr>
                    <th colspan="4" class="text-right">Total</th>
                    <td>{{$selected->harga_total_bahan}}</td>
                  </tr>
                  <tr>
                    <th colspan="4" class="text-right">Jasa</th>
                    <td>{{$selected->harga_jasa}}</td>
                  </tr>
                  <tr>
                    <th colspan="4" class="text-right">Total bayar</th>
                    <td>{{$selected->total_bayar}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection