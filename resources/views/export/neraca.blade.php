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
                <h4>Laporan Neraca</h4>
                <h4>{{ date( 'd/m/Y', strtotime($dari)) }} - {{ date( 'd/m/Y', strtotime($sampai)) }}</h4>
            </div>
        </div>

        <div class="content-body">
            <table style="width: 100%; border-collapse: collapse;">
                <tbody>
                    <tr>
                        <th>
                            <h5 style="text-align: left;">Aktiva</h5>
                        </th>
                    </tr>
                    @foreach ($aktiva_lancar as $al)
                    <tr>
                        <td>
                            <span style="margin-left: 24px; display: inline-block;">{{$al->nama_akun}}</span>
                        </td>
                        <td></td>
                        <td align="right">{{number_format($al->saldo_awal, 0, ',', '.')}}</td>
                    </tr>
                    @endforeach
                    @foreach ($aktiva_tetap as $at)
                    <tr>
                        <td>
                            <span style="margin-left: 24px; display: inline-block;">{{$at->nama_akun}}</span>
                        </td>
                        <td></td>
                        <td align="right">{{number_format($at->saldo_awal, 0, ',', '.')}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>Total aktiva</td>
                        <td></td>
                        <td align="right">{{number_format($total_aktiva, 0, ',', '.')}}</td>
                    </tr>
                    <tr style="border-top: 1px solid grey;">
                        <th>
                            <h5 style="text-align: left;">Pasiva</h5>
                        </th>
                    </tr>
                    @foreach ($utang as $u)
                    <tr>
                        <td>
                            <span style="margin-left: 24px; display: inline-block;">{{$u->nama_akun}}</span>
                        </td>
                        <td></td>
                        <td align="right">{{number_format($u->saldo_awal, 0, ',', '.')}}</td>
                    </tr>
                    @endforeach
                    @foreach ($utang_lancar as $ul)
                    <tr>
                        <td>
                            <span style="margin-left: 24px; display: inline-block;">{{$ul->nama_akun}}</span>
                        </td>
                        <td></td>
                        <td align="right">{{number_format($ul->saldo_awal, 0, ',', '.')}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <th>
                            <h5 style="text-align: left;">Ekuitas</h5>
                        </th>
                    </tr>
                    @foreach ($modal as $m)
                    <tr>
                        <td>
                            <span style="margin-left: 24px; display: inline-block;">{{$m->nama_akun}}</span>
                        </td>
                        <td></td>
                        <td align="right">{{number_format($m->saldo_awal, 0, ',', '.')}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>Total pasiva</td>
                        <td></td>
                        <td align="right">{{number_format($total_pasiva, 0, ',', '.')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
