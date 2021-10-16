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
                    <tr>
                        <td>
                            <span style="margin-left: 24px; display: inline-block;">Kas</span>
                        </td>
                        <td></td>
                        <td align="right">{{$kas}}</td>
                    </tr>
                    @foreach ($assets as $a)
                    <tr>
                        <td>
                            <span style="margin-left: 24px; display: inline-block;">{{$a->nama_aset}}</span>
                        </td>
                        <td></td>
                        <td align="right">{{$a->biaya_akuisisi}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>Total aktiva</td>
                        <td></td>
                        <td align="right">{{$aktiva}}</td>
                    </tr>
                    <tr style="border-top: 1px solid grey;">
                        <th>
                            <h5 style="text-align: left;">Pasiva</h5>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <span style="margin-left: 24px; display: inline-block;">Kewajiban</span>
                        </td>
                        <td></td>
                        <td align="right">{{$beban}}</td>
                    </tr>
                    <tr>
                        <th>
                            <h5 style="text-align:left;">Ekuitas</h5>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <span style="margin-left: 24px; display: inline-block;">Modal</span>
                        </td>
                        <td></td>
                        <td align="right">{{$modal}}</td>
                    </tr>
                    <tr>
                        <td>Total pasiva</td>
                        <td></td>
                        <td align="right">{{$pasiva}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
