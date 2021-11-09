<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Sistem Swalayan - Invoice</title>

    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            height: 29.7cm;
            width: 100%;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-family: Arial;
        }

        header {
            width: 100%;
            padding: 10px 0;
            margin-bottom: 30px;
        }

        h1 {
            border-bottom: 1px solid #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: left;
            margin: 0 0 20px 0;
            background: url(dimension.png);
        }

        #identity {
            display: flex;
        }

        #project {
            float: left;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            margin-right: 10px;
            font-size: 0.9em;
        }

        #company {
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #5D6975;
            white-space: nowrap;
            font-weight: bold;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 15px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.qty {
            text-align: center;
        }

        table td.service,
        table td.unit,
        table td.qty,
        table td.total,
        table td.grand {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;
            font-weight: bold;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }

    </style>
</head>

<body>
    <header class="clearfix">
        <h1>INVOICE</h1>
        <div id="identity">
            <div id="project" >
                <div><strong>Pembeli:</strong></div>
                <div>{{ $order->name }}</div>
                <div>{{ $order->address }}</div>
                <div>{{ $order->district . ', ' . $order->postal_code }}</div>
                <div>{{ $order->city . ', ' . $order->province }}</div>
                <div>{{ $order->phone_number }}</div>
            </div>
            <div id="company" class="clearfix">
                <div><strong>Metode Pembayaran:</strong></div>
                <div>{{ $order->payment->name }}</div>
                <div style="margin-top: 25px"><strong>Tanggal Pemesanan:</strong></div>
                <div>{{ date('d F Y H:i:s', strtotime($order->created_at)) }}</div>
            </div>
        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th class="service">Produk</th>
                    <th class="unit">Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->product as $item)
                    <tr>
                        <td class="qty">{{ $loop->iteration }}</td>
                        <td class="service">{{ $item->name }}</td>
                        <td class="unit">Rp
                            {{ number_format($item->price, 0, ',', '.') }}
                        </td>
                        <td class="qty">{{ $item->pivot->qty }}</td>
                        <td class="total">Rp
                            {{ number_format(($item->price * $item->pivot->qty), 0, ',', '.') }}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="grand total">TOTAL</td>
                    <td class="grand total">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </main>

</body>

</html>
