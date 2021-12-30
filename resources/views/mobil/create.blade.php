@extends('adminlte::page') @section('title', 'Tambah Data Mobil')
@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Home</a></li>
    <li class="breadcrumb-item"><a href="/mobil">Data Mobil</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah</li>
</ol>
@stop @section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
            @includeif('partials.errors')
            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">
                        <h3>Tambah Data Mobil</h3>
                    </span>
                </div>
                <div class="card-body">
                    <form
                        method="POST"
                        action="{{ route('mobil.store') }}"
                        role="form"
                        enctype="multipart/form-data"
                    >
                        @csrf @include('mobil.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection @section('css')
<link rel="stylesheet" href="/css/admin_custom.css" />
@stop
