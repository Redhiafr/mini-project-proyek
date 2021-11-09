@extends('layouts.client.master')

@section('content')
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <span>Order Success</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact__content">
                    <div class="contact__address">
                        <h5>Order Success</h5>
                        <ul>
                            <li>
                                <h6><i class="fa fa-user"></i> Penerima</h6>
                                <p>{{ $orders->name }}</p>
                            </li>
                            <li>
                                <h6><i class="fa fa-phone"></i> Phone</h6>
                                <p>{{ $orders->phone_number }}</p>
                            </li>
                            <li>
                                <h6><i class="fa fa-map-marker"></i> Alamat</h6>
                                <p>{{ $orders->address . ', Kecamatan ' . $orders->district . ', ' . $orders->city . ', ' . $orders->province . ', ' . $orders->postal_code }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__content">
                    <div class="contact__address" style="text-align: right !important">
                        <h5>&nbsp;</h5>
                        <ul>
                            <li>
                                <p>Harap melakukan pembayaran melalui <strong>{{ $orders->payment->name }}</strong> dengan tujuan: </p>
                            </li>
                            <li>
                                <h5>{{ $orders->payment->account_number }}</h5>
                                <p>Sebesar</p>
                            </li>
                            <li>
                                <h5 style="text-transform: none">Rp {{ number_format($orders->total, 0, ',', '.') }}</h5>
                                @php
                                    $created_at = strtotime("2 day", strtotime($orders->created_at));
                                    $due_date = date("d F Y H:i:s", $created_at);
                                @endphp
                                <p>sebelum {{ $due_date }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-lg-12">
                <div class="contact__content">
                    <div class="contact__form">
                        <div class="shop__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->product as $item)
                                        <tr>
                                            <td class="cart__product__item">
                                                <img src="{{ asset('storage/' . $item->image->image_path) }}" alt="" width="90px" height="90px">
                                                <div class="cart__product__item__title">
                                                    <h6 style="word-wrap: break-word; width: 400px">{{ $item->name }}</h6>
                                                </div>
                                            </td>
                                            <td class="cart__price">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                            <td class="cart__quantity">{{ $item->pivot->qty }}</td>
                                            <td class="cart__total">Rp {{ number_format(($item->price * $item->pivot->qty), 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p>Catatan Pemesanan: {{ $orders->note }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->
@endsection
