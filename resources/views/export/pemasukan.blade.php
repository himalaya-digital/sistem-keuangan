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
        <h4>Laporan Pemasukan Kas</h4>
        <h4>{{ date( 'd/m/Y', strtotime($dari)) }} - {{ date( 'd/m/Y', strtotime($sampai)) }}</h4>
      </div>
    </div>

    <div class="content-body">
      <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Total</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($pemasukans as $pemasukan)
          <tr>
            <td>{{ date( 'd/m/Y', strtotime($pemasukan->tanggal_pemasukan)) }}</td>
            <td>{{ $pemasukan->keterangan_pemasukan }}</td>
            <td>{{ number_format($pemasukan->jumlah_pemasukan, 0, ',', '.') }}</td>
          </tr>
          @endforeach
          <tr>
            <th colspan="2">Total</th>
            <td>{{ number_format($total, 0, ',', '.') }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>