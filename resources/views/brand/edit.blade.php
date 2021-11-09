@extends('layouts.admin.master')

@section('title', '- Manajemen Brands Product')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Brands Produk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Data Produk</a></div>
                <div class="breadcrumb-item"><a href="{{ route('categories.index') }}">Brands
                        Produk</a></div>
                <div class="breadcrumb-item">Buat Brands Baru</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Nama Brand</label>
                                    <input type="text" class="form-control" name="name" value="{{ $brand->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea type="text" class="form-control" name="description"> {{ $brand->description}} </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Gambar Brand</label> <br>
                                    <input type="file" name="image" value="{{ $brand->image }}"><br>
                                    <img width="150px" src="{{asset('storage/'.$brand->image)}}">
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('brands.index') }}" class="btn btn-secondary">Cancel</a>
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
