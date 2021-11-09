@extends('layouts.admin.master')

@section('title', '- Manajemen Order')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Transaksi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Transaksi</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 10px">
                                                #
                                            </th>
                                            <th class="text-center">Nama Penerima</th>
                                            <th class="text-center">No Telp</th>
                                            <th class="text-center">Tanggal Order</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order as $o)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $o->name }}</td>
                                                <td class="text-center">{{ $o->phone_number }}</td>
                                                <td class="text-center">{{ $o->created_at }}</td>
                                                <td class="text-center">
                                                    @if($o->status == 1)
                                                        <div class="badge badge-warning">Pending</div>
                                                    @else
                                                        <div class="badge badge-success">Success</div>
                                                    @endif 
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('transactions.show', $o->id) }}" class="btn btn-primary"><i class="fa fa-edit"> Detail</i></a>
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
