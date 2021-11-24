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
                <div class="breadcrumb-item">Produk</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a href="{{ route('products.create') }}"
                                    class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Buat Produk Baru</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 10px">
                                                #
                                            </th>
                                            <th class="text-center">Nama Produk</th>
                                            <th class="text-center">Harga Produk</th>
                                            <th class="text-center">Kategori Produk</th>
                                            <th class="text-center">Merk Produk</th>
                                            <th class="text-center" style="width: 220px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product as $p)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $p->name }}</td>
                                                <td class="text-center">@currency($p->price)</td>
                                                <td class="text-center">{{ $p->category->name }}</td>
                                                <td class="text-center">{{ $p->brand->name }}</td>

                                                <td class="text-center">
                                                    <a href="{{ route('products.edit', $p->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</a>
                                                    <a href="{{ route('products.show', $p->id) }}" class="btn btn-primary"><i class="fa fa-edit">Detail</i></a>
                                                    <form action="{{ route('products.destroy', $p->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                                            Delete</a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
