@extends('layouts.client.master')

@section('content')
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <a href="{{ route('shoppingCarts.index') }}"><span>Keranjang Saya</span></a>
                    <span>Checkout</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <form action="{{ route('order.store') }}" class="checkout__form" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <h5>Detail Pemesanan</h5>
                    <div class="row">
                        <div class="ol-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Nama Penerima <span>*</span></p>
                                <input type="text" name="name" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Nomor Telepon <span>*</span></p>
                                <input type="text" name="phone_number" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Alamat <span>*</span></p>
                                <input type="text" name="address1" placeholder="Alamat" required>
                                <input type="text" name="address2" placeholder="Detail Lainnya (Cth: Blok/Unit No.,Patokan)">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Provinsi <span>*</span></p>
                                <input type="text" name="province" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Kota/Kabupaten <span>*</span></p>
                                <input type="text" name="city" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Kecamatan <span>*</span></p>
                                <input type="text" name="district" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Kode Pos <span>*</span></p>
                                <input type="text" name="postal_code" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Catatan Pemesanan <span></span></p>
                                <input type="text" name="notes" placeholder="Silahkan tinggalkan pesan .... ">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout__order">
                        <h5>Pesanan Anda</h5>
                        <div class="checkout__order__product">
                            <ul>
                                <li>
                                    <span class="top__text">Produk</span>
                                    <span class="top__text__right">Total</span>
                                </li>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($orders as $order)
                                    @php
                                        $total += $order->product->price * $order->qty;
                                    @endphp
                                    <li>{{ $loop->iteration . '. ' . $order->product->name}}<span>Rp {{ number_format(($order->product->price * $order->qty), 0, ',', '.') }}</span></li>
                                    <input type="hidden" name="product_id[]" value="{{ $order->product->id }}">
                                    <input type="hidden" name="qty[]" value="{{ $order->qty }}">
                                    <input type="hidden" name="cart_id[]" value="{{ $order->id }}">
                                @endforeach
                            </ul>
                        </div>
                        <div class="checkout__order__total">
                            <ul>
                                <li>Total <span>Rp {{ number_format($total, 0, ',', '.') }}</span></li>
                                <input type="hidden" name="total" value="{{ $total }}">
                            </ul>
                        </div>
                        <div class="checkout__order__widget">
                            <p>Pilih Metode Pembayaran</p>
                            @foreach ($payments as $payment)
                                <label for="check-payment{{ $payment->id }}">
                                    {{ $payment->name }}
                                    <input type="radio" id="check-payment{{ $payment->id }}" name="payment_id" value="{{ $payment->id }}">
                                    <span class="checkmark"></span>
                                </label>
                            @endforeach
                        </div>
                        <button type="submit" class="site-btn">Place oder</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Checkout Section End -->
@endsection
