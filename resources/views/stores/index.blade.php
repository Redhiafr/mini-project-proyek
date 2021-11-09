@extends('layouts.admin.master')

@section('title', '- Manajemen Toko')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Toko</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Toko</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ $store == null ? route('stores.store') : route('stores.update', $store->id) }}">
                                    @csrf
                                    @if ($store != null)
                                        @method('PUT')
                                    @endif
                                    <div class="form-group">
                                        <label>Nama Toko</label>
                                        <input type="text" class="form-control" name="name" value="{{ $store == null ? '' : $store->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi Toko</label>
                                        <textarea class="form-control" name="description" id="description" rows="3">{{ $store == null ? '' : $store->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="address" id="address" rows="3">{{ $store == null ? '' : $store->address }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label>No Telepon</label>
                                            <input type="text" class="form-control" value="{{ $store == null ? '' : $store->no_telp }}" name="no_telp">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Email</label>
                                            <input type="text" class="form-control" value="{{ $store == null ? '' : $store->email }}" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
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
