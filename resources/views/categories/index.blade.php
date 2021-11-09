@extends('layouts.admin.master')

@section('title', '- Manajemen Kategori Product')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kategori Produk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Data Produk</a></div>
                <div class="breadcrumb-item">Kategori Produk</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a href="{{ route('categories.create') }}"
                                    class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Buat Kategori Baru</a>
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
                                            <th>Nama Kategori</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i>
                                                        Edit</a>
                                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
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
