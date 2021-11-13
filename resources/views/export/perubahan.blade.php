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
        <h4>Laporan Perubahan Modal</h4>
        <h4>{{ date( 'd/m/Y', strtotime($dari)) }} - {{ date( 'd/m/Y', strtotime($sampai)) }}</h4>
      </div>
    </div>

    <div class="content-body">
      <table border="1" style="width: 100%; border-collapse: collapse;">
        <tbody>
          <tr>
            <td>Modal Awal</td>
            <td>{{ number_format($modalawal - $tambahanmodal, 0, ',', '.') }}</td>
          </tr>
          <tr>
            <td>Laba Bersih</td>
            <td>{{ number_format($totalpemasukan - $total, 0, ',', '.') }}</td>
          </tr>
          <tr>
            <td>Prive Pemilik</td>
            <td>{{ number_format($prive, 0, ',', '.') }}</td>
          </tr>
          <tr>
            <td>Penambahan Modal</td>
            <td>{{ number_format($tambahanmodal, 0, ',', '.') }}</td>
          </tr>
          <tr>
            <th style="text-align: left;">Modal Akhir</th>
            <th style="text-align: left;">
              @php
              $laba = $totalpemasukan - $total;
              @endphp
              {{ number_format($modalawal + $laba + $tambahanmodal - $prive, 0, ',', '.') }}
            </th>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>