@extends('layouts.client.master')

@section('title', '- Manajemen Product')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <span>Beli</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Kategori</h4>
                            </div>
                            @foreach ($categories as $category)
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="active">
                                            <a href="{{route('filter',$category->id)}}">{{ $category->name }}</a>
                                        </div>
                                    </div>
                                    <div class="card">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="sidebar__filter">
                            <div class="section-title">
                                <h4>Beli Berdasarkan Harga</h4>
                            </div>
                            <div class="filter-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="33" data-max="99"></div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <p>Price:</p>
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                            <a href="#">Filter</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{asset('storage/'.$product->image->image_path)}}" style="background-size: contain; background-position: center center;">
                                    <ul class="product__hover">
                                        <li><a href="{{asset('storage/'.$product->image->image_path)}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{route('detail',$product->id)}}">{{ $product->name }}</a></h6>
                                    <div class="product__price">@currency($product->price)</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-12 text-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
    @endsection
