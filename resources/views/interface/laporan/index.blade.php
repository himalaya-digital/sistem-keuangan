@extends('layouts.app')

@section('additional-css')
<style>
  .sip a:hover {
    text-decoration: none !important;
  }
</style>
@endsection

@section('content')
<div class="section-header">
  <h1>Data User</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12 col-md-6 col-lg-3 sip">
      <a href="{{ route('laporan-pemasukan.index') }}" class="kartu">
        <div class="card align-center">
          <div class="card-header justify-content-center">
            <i class="fas fa-plus-square" style="font-size: 48px"></i>
          </div>
          <div class="card-body text-center">
            <p>PEMASUKAN KAS</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3 sip">
      <a href="{{ route('laporan-pengeluaran.index') }}" class="kartu">
        <div class="card align-center">
          <div class="card-header justify-content-center">
            <i class="fas fa-minus-square" style="font-size: 48px"></i>
          </div>
          <div class="card-body text-center">
            <p>PENGELUARAN KAS</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3 sip">
      <a href="{{ route('laba-rugi.index') }}" class="kartu">
        <div class="card align-center">
          <div class="card-header justify-content-center">
            <i class="far fa-money-bill-alt" style="font-size: 48px"></i>
          </div>
          <div class="card-body text-center">
            <p>LABA RUGI</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3 sip">
      <a href="#" class="kartu">
        <div class="card align-center">
          <div class="card-header justify-content-center">
            <i class="fas fa-search" style="font-size: 48px"></i>
          </div>
          <div class="card-body text-center">
            <p>NERACA</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3 sip">
      <a href="#" class="kartu">
        <div class="card align-center">
          <div class="card-header justify-content-center">
            <i class="fas fa-arrows-alt-h" style="font-size: 48px"></i>
          </div>
          <div class="card-body text-center">
            <p>ARUS KAS</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3 sip">
      <a href="#" class="kartu">
        <div class="card align-center">
          <div class="card-header justify-content-center">
            <i class="fas fa-sync-alt" style="font-size: 48px"></i>
          </div>
          <div class="card-body text-center">
            <p>PERUBAHAN MODAL</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3 sip">
      <a href="{{route('laporan-data-proyek.index')}}" class="kartu">
        <div class="card align-center">
          <div class="card-header justify-content-center">
            <i class="far fa-building" style="font-size: 48px"></i>
          </div>
          <div class="card-body text-center">
            <p>DATA PROYEK</p>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>
@endsection