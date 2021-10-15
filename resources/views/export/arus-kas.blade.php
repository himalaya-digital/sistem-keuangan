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
        <h4>Laporan Arus Kas</h4>
        <h4>{{ date( 'd/m/Y', strtotime($dari)) }} - {{ date( 'd/m/Y', strtotime($sampai)) }}</h4>
      </div>
    </div>

    <div class="content-body">
      <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
          <tr>
            <th colspan="2" style="text-align: left;">Aktivitas Operasional</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Pendapatan</td>
            <td>{{ number_format($pemasukan, 0, ',', '.') }}</td>
          </tr>
          <tr>
            <td>Pengeluaran</td>
            <td>{{ number_format($pengeluaran, 0, ',', '.') }}</td>
          </tr>
          <tr>
            <td>Beban Proyek</td>
            <td>{{ number_format($beban, 0, ',', '.') }}</td>
          </tr>
          <tr>
            <th style="text-align: left;">Total</th>
            <th style="text-align: left;">{{ number_format($pemasukan - $pengeluaran - $beban, 0, ',', '.') }}</th>
          </tr>
        </tbody>

        <thead>
          <tr>
            <th colspan="2" style="text-align: left;">Aktivitas Investasi</th>
          </tr>
        </thead>
        <tbody>
          @if (isset($investasis))
          @foreach ($investasis as $investasi)
          <tr>
            <td>{{ $investasi->dataakun->nama_akun }}</td>
            <td>{{ number_format($investasi->total_pengeluaran, 0, ',', '.') }}</td>
          </tr>
          @endforeach
          @else
          -
          @endif
          <tr>
            <th style="text-align: left;">Total</th>
            @if (isset($investasitotal))
            <th style="text-align: left;">{{ number_format($investasitotal, 0, ',', '.') }}</th>
            @endif
          </tr>
        </tbody>

        <thead>
          <tr>
            <th colspan="2" style="text-align: left;">Aktivitas Pendanaan</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Saldo Kas Awal Periode</td>
            <td>
              @if (isset($kas))
              {{ number_format($kas, 0, ',', '.') }}
              @else
              -
              @endif
            </td>
          </tr>
          <tr>
            <td>Prive</td>
            <td>
              @if (isset($prive))
              {{ number_format($prive, 0, ',', '.') }}
              @endif
            </td>
          </tr>
          <tr>
            <td>Penambahan Modal</td>
            <td>
              @if (isset($tambahanmodal))
              {{ number_format($tambahanmodal, 0, ',', '.') }}
              @endif
            </td>
          </tr>
          <tr>
            <th style="text-align: left;">Saldo Akhir Periode</th>
            @php
            $operasional = $pemasukan - $pengeluaran - $beban;
            $investasi = $investasitotal;
            $pendanaan = $prive;
            $penurunanKas = $operasional - $investasi - $pendanaan;
            $saldoAwal = $kas;
            if ($saldoAwal != 0) {
            $result = $saldoAwal - $penurunanKas + $tambahanmodal;
            }
            $result = $penurunanKas + $tambahanmodal;
            @endphp
            <th style="text-align: left;">{{ number_format($result, 0, ',', '.') }}</th>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>