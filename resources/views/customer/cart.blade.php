@extends('layouts.client.master')

@section('content')
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <span>Keranjang Saya</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
    <div class="container">
        <form action="{{ url('shoppingCarts/update') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($carts as $cart)
                                    @php
                                        $total += $cart->product->price * $cart->qty;
                                    @endphp
                                    <tr>
                                        <td class="cart__product__item">
                                            <img src="{{ asset('storage/' . $cart->product->image->image_path) }}" alt="" width="90px" height="90px">
                                            <div class="cart__product__item__title">
                                                <h6 style="word-wrap: break-word; width: 400px">{{ $cart->product->name }}</h6>
                                            </div>
                                        </td>
                                        <td class="cart__price">Rp {{ number_format($cart->product->price, 0, ',', '.') }}</td>
                                        <td class="cart__quantity">
                                            <div class="pro-qty">
                                                <input type="text" name="qty[]" value="{{ $cart->qty }}">
                                            </div>
                                        </td>
                                        <td class="cart__total">Rp {{ number_format(($cart->product->price * $cart->qty), 0, ',', '.') }}</td>
                                        <input type="hidden" name="cart_id[]" value="{{ $cart->id }}">
                                        <td class="cart__close">
                                            <a href="{{ route('shoppingCarts.destroy', $cart->id) }}" class="button"><span class="icon_close"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="{{ url('shop') }}">Kembali Berbelanja</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <button type="submit" class="button"><span class="icon_loading"></span> Memperbaharui Keranjang</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-4 offset-lg-2">
                <div class="cart__total__procced">
                    <h6>Total Pembelian</h6>
                    <ul>
                        <li>Total <span>Rp {{ number_format($total, 0, ',', '.') }}</span></li>
                    </ul>
                    <a href="{{ route('order.create') }}" class="primary-btn">Memproses Pembelian</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Cart Section End -->
@endsection

@push('style')
<style>
    .button {
        border: none;
        outline: none;
        padding: 0;
        background: none;
    }
</style>
@endpush