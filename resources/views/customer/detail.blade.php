@extends('layouts.client.master')

@section('content')
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <a href="{{ route('shop') }}"> Beli</a>
                    <span>{{ $products->name }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__left product__thumb nice-scroll">
                        @foreach ($images as $image)
                            <a class="pt" href="#product-{{ $loop->iteration }}">
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="">
                            </a>
                        @endforeach
                    </div>
                    <div class="product__details__slider__content">
                        <div class="product__details__pic__slider owl-carousel">
                            @foreach ($images as $image)
                                <img data-hash="product-{{ $loop->iteration }}" class="product__big__img" src="{{ asset('storage/' . $image->image_path) }}" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product__details__text">
                    <h3>{{ $products->name }}  <span> Brand: {{ $products->brand->name }}</span></h3>
                    <div class="product__details__price"> Rp {{ number_format($products->price, 0, ',', '.') }}</div>
                    <p>{{ $products->description}}</p>
                    <div class="product__details__button">
                        <form action="{{ route('shoppingCarts.store') }}" method="post">
                            @csrf
                            <div class="quantity">
                                <span>Jumlah:</span>
                                <div class="pro-qty">
                                    <input type="text" name="qty" value="1">
                                </div>
                            </div>
                            <input type="hidden" name="product_id" value="{{ $products->id }}">
                            @auth
                                <button type="submit" class="cart-btn" style="border: none"><span class="icon_bag_alt"></span> Tambah Ke Keranjang</button>
                            @else
                                <a href="#" class="cart-btn" data-toggle="modal" data-target="#modalLogin"><span class="icon_bag_alt"></span> Tambah Ke Keranjang</a>
                            @endauth
                        </form>
                    </div>
                        <div class="product__details__widget"> </div>
                    </div>
                </div>
            </div>
                    
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Deskripsi Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Informasi Promo</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <h6>Deskripsi</h6>
                            <p>{{ $products->description}}</p>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <h6>Informasi Promo</h6>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret. Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla consequat massa quis enim.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center"></div>
        </div>
    </div>
</section>  
<!-- Product Details Section End -->
@endsection