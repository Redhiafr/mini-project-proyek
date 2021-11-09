@extends('layouts.client.master')

@section('content')
    <!-- Banner Section Begin -->
    <section class="banner set-bg" data-setbg="img/banner/banner-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8 m-auto">
                    <div class="banner__slider owl-carousel">
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>Tempat untuk menampilkan</span>
                                <h1>Promo 1</h1>
                                <a href="#">Belanja Sekarang</a>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>Tempat untuk menampilkan</span>
                                <h1>Promo 2</h1>
                                <a href="#">Belanja Sekarang</a>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>Tempat untuk menampilkan</span>
                                <h1>Promo 3</h1>
                                <a href="#">Belanja Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h4>Produk Baru</h4>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <ul class="filter__controls">
                        <li><a href="{{ route('shop') }}">Show All <i class="fas fa-chevron-right"></i> </a></li>
                    </ul>
                </div>
            </div>
            <div class="row property__gallery">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{asset('storage/'.$product->image->image_path)}}"
                                style="background-size: contain; background-position: center center;">
                                <div class="label new">Baru</div>
                                <ul class="product__hover">
                                    <li><a href="{{asset('storage/'.$product->image->image_path)}}" class="image-popup"><span
                                                class="arrow_expand"></span></a></li>
                                    <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                    <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="{{route('detail',$product->id)}}">{{ $product->name }}</a></h6>
                                <div class="product__price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Services Section Begin -->
    <section class="services spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-car"></i>
                        <h6>Layanan Pengantaran</h6>
                        <p>Seluruh Indonesia</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-exchange"></i>
                        <h6>Kebijakan Pengembalian</h6>
                        <p>Jika Barang Rusak atau Cacat</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-money"></i>
                        <h6>Pembayaran</h6>
                        <p>100% Aman Terpercaya</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-phone"></i>
                        <h6>Hubungi Kami</h6>
                        <p>Hadir 24/7</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->
@endsection
