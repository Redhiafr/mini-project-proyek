@extends('layouts.admin.master')

@section('title', '- Manajemen Product')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Produk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Data Produk</a></div>
                <div class="breadcrumb-item"><a href="{{ route('products.index') }}">Produk</a>
                </div>
                <div class="breadcrumb-item">Detail Produk</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tickets">
                                <div class="ticket-items" id="ticket-items">
                                    <div class="ticket-item p-0" style="cursor: default; background-color: white">
                                        <img width="250px" src="{{asset('storage/'.$product->image->image_path)}}" alt="">
                                        
                                    </div>
                                </div>
                                <div class="ticket-content">
                                    <div class="ticket-header d-flex justify-content-between">
                                        <div class="ticket-detail">
                                            <div class="ticket-title">
                                                <h4>{{$product->name}}</h4>
                                            </div>
                                        </div>
                                        <div class="ticket-detail">
                                            <div class="ticket-title">
                                                <h4 class="text-primary">@currency($product->price)</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <dl class="row mt-2">
                                        <dt class="col-sm-3">Kategori</dt>
                                        <dd class="col-sm-9 text-primary">{{ $product->category->name }}</dd>

                                        <dt class="col-sm-3">Brand</dt>
                                        <dd class="col-sm-9 text-primary">{{ $product->brand->name }}</dd>

                                        <dt class="col-sm-3">Stok</dt>
                                        <dd class="col-sm-9">{{$product->stock}}</dd>
                                    </dl>
                                    <div class="ticket-description mt-0">
                                        <h6 style="color: #6c757d">Deskripsi Produk</h6>
                                        <p>{{$product->description}}</p>

                                        <div class="gallery">
                                            @foreach ($images as $image)
                                                <div class="gallery-item"
                                                    data-image="{{ asset('storage/' . $image->image_path) }}"
                                                    data-title="Image 1"></div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                        <a href="{{ route('products.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('style')
<link rel="stylesheet" href="{{ asset('modules/chocolat/dist/css/chocolat.css') }}">
@endpush

@push('script')
<script src="{{ asset('modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script> 
@endpush
