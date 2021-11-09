@extends('layouts.admin.master')

@section('title', '- Manajemen Order')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Transaksi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('transactions.index') }}">Transaksi</a></div>
                <div class="breadcrumb-item">Detail Transaksi</div>
            </div>
        </div>
        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Pembeli:</strong><br>
                                        {{ $order->name }}<br>
                                        {{ $order->address }}<br>
                                        {{ $order->district . ', ' . $order->postal_code }}<br>
                                        {{ $order->city . ', ' . $order->province }}<br>
                                        {{ $order->phone_number }}
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Metode Pembayaran:</strong><br>
                                        {{ $order->payment->name }}
                                    </address>
                                    <address>
                                        <strong>Tanggal Pemesanan:</strong><br>
                                        {{ date('d F Y H:i:s', strtotime($order->created_at)) }}<br>
                                    </address>
                                    <address>
                                        <strong>Status:</strong><br>
                                        {{ $order->status == 1 ? 'Pending' : 'Success'}}<br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">Order Product</div>
                            <p class="section-lead">Semua produk yang sudah dipesan tidak dapat dibatalkan atau dikembalikan.</p>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th data-width="40">#</th>
                                        <th>Produk</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                    @foreach ($order->product as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td class="text-center">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                            <td class="text-center">{{ $item->pivot->qty }}</td>
                                            <td class="text-right">Rp {{ number_format(($item->price * $item->pivot->qty), 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-8">
                                    <p>Catatan Pemesanan: {{ $order->note }}</p>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <hr class="mt-2 mb-2">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Total</div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">Rp {{ number_format($order->total, 0, ',', '.') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-md-right">
                    @if ($order->status == 1)
                        <a href="{{ route('invoice', $order->id) }}" class="btn btn-success btn-icon icon-left"><i class="fas fa-check"></i> Selesai</a>
                    @else
                        <a href="{{ route('invoice', $order->id) }}" class="btn btn-primary btn-icon icon-left"><i class="fas fa-print"></i> Cetak Nota</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
