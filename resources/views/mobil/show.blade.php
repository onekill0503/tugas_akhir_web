@extends('adminlte::page') @section('title', 'Detail Mobil')
@section('content_header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item">
            <a href="/mobil"> Data Mobil</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Lihat</li>
    </ol>
</nav>
@stop @section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-6 col-sm-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">
                            <h3>Lihat Detail Mobil</h3>
                        </span>
                    </div>
                    <div class="float-right">
                        <a
                            class="btn btn-primary"
                            href="{{ route('mobil.index') }}"
                        >
                            Kembali</a
                        >
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tr>
                            <td style="width: 200px;">
                            <strong>Merk Mobil</strong></td>
                            <td>: {{ $mobil->merk }}</td>
                        </tr>
                        <tr>
                            <td><strong>Seri Mobil</strong></td>
                            <td>: {{ $mobil->seri }}</td>
                        </tr>
                        <tr>
                            <td><strong>Harga Mobil</strong></td>
                            <td>: @php echo "Rp. " . number_format($mobil->harga) @endphp</td>
                        </tr>
                        <tr>
                            <td><strong>Volume Mobil </strong></td>
                            <td>: {{ $mobil->volume_mobil }}</td>
                        </tr>
                        <tr>
                            <td><strong>Warna Mobil </strong></td>
                            <td>: {{ $mobil->warna }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">
                            <h3>Foto Mobil</h3>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <img src="{{ URL::to('/foto_mobil/'. $mobil->foto) }}">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
