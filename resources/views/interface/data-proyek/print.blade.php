<head>
  <title>Print - {{$project->nama_proyek}}</title>
  <style>
    * {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .content-header-child {
      display: inline-block;
      width: 50%;
      vertical-align: top;
    }

    .content-body table th,
    .content-body table td {
      padding: 4px 8px;
    }
  </style>
</head>

<body>
  <header style="text-align: center; border-bottom: 1px solid grey; margin-bottom: 16px;">
    <h2 style="margin-bottom: 0;">PT. SAPUTRA TIRTHA AMERTHA</h2>
    <h4>Jalan Kecumbung No. 38</h4>
  </header>

  <div class="content">
    <div class="content-header">
      <div class="content-header-child">
        <table>
          <tr>
            <th align="left">Nama Customer</th>
            <td>{{$project->customer->nama_customer}}</td>
          </tr>
          <tr>
            <th align="left">Nama Proyek</th>
            <td>{{$project->nama_proyek}}</td>
          </tr>
        </table>
      </div>
      <div class="content-header-child">
        <table>
          <tr>
            <th align="left">Keterangan Pembayaran</th>
            <td>{{$project->keterangan_bayar}}</td>
          </tr>
          <tr>
            <th align="left">Tanggal pembayaran</th>
            <td>{{ date( 'd-m-Y', strtotime($project->tanggal_bayar)) }}</td>
          </tr>
        </table>
      </div>
    </div>

    <div class="content-body">
      <p>Rincian biaya</p>
      <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
          <tr>
            <th>No</th>
            <th>Item</th>
            <th>Jumlah</th>
            <th>Harga satuan</th>
            <th>Total</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($project->bahans as $b)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$b->kategori->nama_kategori}}</td>
            <td>{{$b->jumlah}}</td>
            <td>{{number_format($b->kategori->harga_satuan, 0, ',', '.')}}</td>
            <td>{{number_format($b->total, 0, ',', '.')}}</td>
          </tr>
          @endforeach
          <tr>
            <td></td>
            <td>Jasa</td>
            <td>-</td>
            <td>-</td>
            <td>{{number_format($project->harga_jasa, 0, ',', '.')}}</td>
          </tr>
          <tr>
            <th colspan="4">Total bayar</th>
            <td>{{number_format($project->total_bayar, 0, ',', '.')}}</td>
          </tr>
          <tr>
            <th colspan="4">Bayar</th>
            <td>{{number_format($project->bayar, 0, ',', '.')}}</td>
          </tr>
          <tr>
            <th colspan="4">Sisa bayar</th>
            <td>{{number_format($project->sisa_bayar, 0, ',', '.')}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>