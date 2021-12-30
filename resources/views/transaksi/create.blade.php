@extends('adminlte::page') @section('title', 'Transaksi Baru')
@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Home</a></li>
    <li class="breadcrumb-item"><a href="/transaksi">Transaksi</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah</li>
</ol>
@stop @section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6">
            @includeif('partials.errors')
            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">
                        <h3>Transaksi Baru</h3>
                    </span>
                </div>
                <div class="card-body">
                    <form
                        method="POST"
                        action="{{ route('transaksi.store') }}"
                        role="form"
                        enctype="multipart/form-data"
                    >
                        @csrf @include('transaksi.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection @section('css')
<link rel="stylesheet" href="/css/admin_custom.css" />
@stop
