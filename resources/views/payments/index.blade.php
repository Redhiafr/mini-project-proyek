@extends('layouts.admin.master')

@section('title', '- Manajemen Pembayaran')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pembayaran</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Pembayaran</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a href="{{ route('payments.create') }}" class="btn btn-primary btn-sm"><i
                                            class="fa fa-plus"></i> Buat Pembayaran Baru</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 10px">
                                                   No
                                                </th>
                                                <th>Nama Pembayaran</th>
                                                <th>Nama Akun</th>
                                                <th>Nomor Akun</th>
                                                <th>Gambar</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($payments as $py)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $py->name }}</td>
                                                    <td>{{ $py->account_name }}</td>
                                                    <td>{{ $py->account_number }}</td>
                                                    <td>
                                                        @if ($py->image != null)
                                                            <img width="100px" src="{{ asset('storage/' . $py->image) }}">
                                                        @endif 
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('payments.edit', $py->id) }}"
                                                            class="btn btn-primary"><i class="fa fa-edit"></i>
                                                            Edit</a>
                                                        <form action="{{ route('payments.destroy', $py->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fa fa-trash"></i>
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
