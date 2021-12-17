@extends('layouts.client.master')

@section('content')
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <span>Pesanan saya</span>
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
                                    <th class="text-center">No</th>
                                    <th class="text-center">Tanggal Pemesanan</th>
                                    <th class="text-center">Produk</th>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Pembayaran</th>
                                    <th class="text-center">Status</th>
                                    <th><th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($histories as $o)
                                        @php
                                        $total = $o->total;
                                        @endphp
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $o->created_at }}</td>
                                        {{--  <td class="text-center">{{ $o->order}}</td>  --}}
                                        <td class="text-center">{{ $o->product->name }}</td>
                                        <img src="{{ asset('storage/' . $o->product->image->image_path) }}" alt="" width="90px" height="90px">
                                        <td class="text-center">Rp {{ number_format($o->total, 0, ',', '.') }}</td>
                                        <td class="text-center">{{  $o->payment->name }}</td>
                                        <td class="text-center">
                                             @if($o->status == 1)
                                                <div class="badge badge-warning">Pending</div>
                                            @else
                                                <div class="badge badge-success">Success</div>
                                             @endif 
                                            </td>
                                        </td>
                                    </tr>
                                @endforeach
                                {{--  @foreach ($histories->product as $item)
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
                                    @endforeach  --}}
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="{{ url('shop') }}">BELI LAGI</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-4 offset-lg-2">
                {{--  <div class="cart__total__procced">
                    <h6>Total Pengeluaran</h6>
                    <ul>
                        <li>Total <span>Rp {{ number_format($total, 0, ',', '.') }}</span></li>
                    </ul>
                    <a href="{{ url('shop') }}" class="primary-btn">SELESAI</a>  --}}
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