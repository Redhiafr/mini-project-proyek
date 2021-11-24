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
                <div class="breadcrumb-item">Edit Produk</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Produk</label>
                                    <textarea type="text" class="form-control" name="description"> {{ $product->description}} </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Stok Produk</label>
                                    <input type="text" class="form-control" name="stock" value="{{ $product->stock }}">
                                </div>
                                <div class="form-group">
                                    <label>Harga Produk</label>
                                    <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                                </div>
                                <div class="form-group">
                                    <label for="category">Kategori Produk</label> 
                                    <select class="form-control select2" name="category_id" id="category_id">
                                    @foreach($category as $ctg)
                                        <option value="{{$ctg->id}}" {{ $product->category_id == $ctg->id ? 'selected' : '' }}>{{$ctg->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="brand">Merk Produk</label> 
                                    <select class="form-control select2" name="brand_id" id="brand_id">
                                    @foreach($brand as $bad)
                                        <option value="{{$bad->id}}" {{ $product->brand_id == $bad->id ? 'selected' : '' }}>{{$bad->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Gambar Produk 1</label>
                                        <input type="file" class="form-control" name="image_path[]">
                                        @if (count($images) != 0)
                                            <img width="150px" src="{{asset('storage/'. $images[0]->image_path)}}">
                                            <input type="hidden" name="image_old[]" value="{{ $images[0]->image_path }}">
                                        @endif
                                    </div>
                                    <div class="col">
                                        <label>Gambar Produk 2</label>
                                        <input type="file" class="form-control" name="image_path[]">
                                        @if (!(count($images) <= 1))
                                            <img width="150px" src="{{asset('storage/'. $images[1]->image_path)}}">
                                            <input type="hidden" name="image_old[]" value="{{ $images[1]->image_path }}">
                                        @endif
                                    </div>
                                    <div class="col">
                                        <label>Gambar Produk 3</label>
                                        <input type="file" class="form-control" name="image_path[]">
                                        @if (!(count($images) <= 2))
                                            <img width="150px" src="{{asset('storage/'. $images[2]->image_path)}}">
                                            <input type="hidden" name="image_old[]" value="{{ $images[2]->image_path }}">
                                        @endif
                                    </div>
                                    <div class="col">
                                        <label>Gambar Produk 4</label>
                                        <input type="file" class="form-control" name="image_path[]">
                                        @if (!(count($images) <= 3))
                                            <img width="150px" src="{{asset('storage/'. $images[3]->image_path)}}">
                                            <input type="hidden" name="image_old[]" value="{{ $images[3]->image_path }}">
                                        @endif
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
