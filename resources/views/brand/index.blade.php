@extends('layouts.admin.master')

@section('title', '- Manajemen Brands Product')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Merk Produk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Data Produk</a></div>
                <div class="breadcrumb-item">Merk Produk</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a href="{{ route('brands.create') }}"
                                    class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Buat Merk Baru</a>
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
                                            <th class="text-center">Nama Merk</th>
                                            <th class="text-center">Deskripsi Merk</th>
                                            <th class="text-center">Gambar Merk</th>
                                            <th class="text-center" style="width: 170px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($brand as $b)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $b->name }}</td>
                                                <td class="text-center">{{ $b->description }}</td>
                                                <td class="text-center"> <img width="150px" src="{{asset('storage/'.$b->image)}}"></td>


                                                <td class="text-center">
                                                    <a href="{{ route('brands.edit', $b->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i>
                                                        Edit</a>
                                                    <form action="{{ route('brands.destroy', $b->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                                           Hapus</a>
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
