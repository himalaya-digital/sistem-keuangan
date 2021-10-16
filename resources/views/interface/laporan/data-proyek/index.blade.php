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
        <div class="card-header align-items-center justify-content-center">
          <div class="text-center" style="flex: 1">
            <h3>PT. SAPUTRA TIRTHA AMERTHA</h3>
            <h4>Jalan Kecumbung No. 38</h4>
          </div>
          <div class="card-header-action">
            <a href="{{route('laporan-data-proyek.print', ['nama_proyek' => $selected->id, 'nama_customer' => $selected->customer->id])}}"
              class="btn btn-icon btn-warning"><i class="fas fa-file-download" style="font-size: 18px"></i></a>
          </div>
        </div>
        <div class="card-body">
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
                  <td>{{ date( 'd-m-Y', strtotime($selected->tanggal_mulai)) }}</td>
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
                  <td>{{ date( 'd-m-Y', strtotime($selected->tanggal_selesai)) }}</td>
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
                    <td>{{number_format($b->kategori->harga_satuan, 0, ',', '.')}}</td>
                    <td>{{number_format($b->total, 0, ',', '.')}}</td>
                  </tr>
                  @endforeach
                  <tr>
                    <th colspan="4" class="text-right">Total</th>
                    <td>{{number_format($selected->harga_total_bahan, 0, ',', '.')}}</td>
                  </tr>
                  <tr>
                    <th colspan="4" class="text-right">Jasa</th>
                    <td>{{number_format($selected->harga_jasa, 0, ',', '.')}}</td>
                  </tr>
                  <tr>
                    <th colspan="4" class="text-right">Total bayar</th>
                    <td>{{number_format($selected->total_bayar, 0, ',', '.')}}</td>
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