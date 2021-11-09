@extends('layouts.admin.master')

@section('title', '- Manajemen Product')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Produk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Data Produk</a></div>
                <div class="breadcrumb-item"><a href="{{ route('products.index') }}">
                        Produk</a></div>
                <div class="breadcrumb-item">Buat Produk Baru</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Produk</label>
                                    <textarea type="text" class="form-control" name="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Stok Produk</label>
                                    <input type="text" class="form-control" name="stock">
                                </div>
                                <div class="form-group">
                                    <label>Harga Produk</label>
                                    <input type="text" class="form-control" name="price">
                                </div>
                                <div class="form-group">
                                    <label for="category">Kategori Produk</label> 
                                    <select class="form-control select2" name="category_id" id="category_id">
                                    <option value="" disabled hidden selected>== Pilih Kategori ==</option>
                                    @foreach($category as $ctg)
                                        <option value="{{$ctg->id}}">{{$ctg->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="brand">Brand Produk</label> 
                                    <select class="form-control select2" name="brand_id" id="brand_id">
                                    <option value="" disabled hidden selected>== Pilih Brand ==</option>
                                    @foreach($brand as $bad)
                                        <option value="{{$bad->id}}">{{$bad->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Gambar Produk 1</label>
                                        <input type="file" class="form-control" name="image_path[]">
                                    </div>
                                    <div class="col">
                                        <label>Gambar Produk 2</label>
                                        <input type="file" class="form-control" name="image_path[]">
                                    </div>
                                    <div class="col">
                                        <label>Gambar Produk 3</label>
                                        <input type="file" class="form-control" name="image_path[]">
                                    </div>
                                    <div class="col">
                                        <label>Gambar Produk 4</label>
                                        <input type="file" class="form-control" name="image_path[]">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
