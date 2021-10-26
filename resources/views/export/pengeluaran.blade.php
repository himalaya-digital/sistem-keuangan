<head>
  <style>
    * {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .content-header-child {
      display: inline-block;
      text-align: center;
      width: 100%;
      vertical-align: top;
    }

    .content-body table th,
    .content-body table td {
      padding: 4px 8px;
    }
  </style>
</head>

<body>
  <header style="text-align: center; border-bottom: 1px solid grey;">
    <h2 style="margin-bottom: 0;">PT. SAPUTRA TIRTHA AMERTHA</h2>
    <h4>Jalan Kecumbung No. 38</h4>
  </header>

  <div class="content">
    <div class="content-header">
      <div class="content-header-child">
        <h4>Laporan Pengeluaran Kas</h4>
        <h4>{{ date( 'd/m/Y', strtotime($dari)) }} - {{ date( 'd/m/Y', strtotime($sampai)) }}</h4>
      </div>
    </div>

    <div class="content-body">
      <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Kategori</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Total</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($pengeluarans as $pengeluaran)
          <tr>
            <th>{{ date( 'd/m/Y', strtotime($pengeluaran->tanggal_pengeluaran)) }}</th>
            <td>{{ $pengeluaran->kategori->nama_kategori }}</td>
            <td>{{ $pengeluaran->jumlah }}</td>
            <td>{{ number_format($pengeluaran->dataakun->saldo_awal, 0, ',', '.') }}</td>
            <td>{{ number_format($pengeluaran->total_pengeluaran, 0, ',', '.') }}</td>
          </tr>
          @endforeach
          <tr>
            <th colspan="4">Total</th>
            <td>{{ number_format($total, 0, ',', '.') }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>