@extends('layouts.admin.master')

@section('title', '- Manajemen Payment')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pembayaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('payments.index') }}">Pembayaran</a></div>
                <div class="breadcrumb-item">Edit Pembayaran</div>
            </div>
        </div>


          <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('payments.update', $payment->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Nama Pembayaran</label>
                                    <input type="text" class="form-control" name="name" value="{{ $payment->name }}">
                                </div>
                                 <div class="form-group">
                                    <label>Nama Akun</label>
                                    <input type="text" class="form-control" name="account_name" value="{{ $payment->account_name }}">
                                </div>
                                 <div class="form-group">
                                    <label>Nomor Akun</label>
                                    <input type="text" class="form-control" name="account_number" value="{{ $payment->account_number }}">
                                </div>
                                 <div class="form-group">
                                    <label>Logo Pembayaran</label>
                                    <input type="file" class="form-control" name="image" value="{{ $payment->image }}"><br>
                                    <img width="150px" src="{{ asset('storage/'.$payment->image) }}">
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('payments.index') }}" class="btn btn-secondary">Cancel</a>
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
