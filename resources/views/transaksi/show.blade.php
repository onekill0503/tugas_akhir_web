@extends('adminlte::page') @section('title', 'Detail Transaksi')
@section('content_header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item">
            <a href="/transaksi"> Data Transaksi</a>
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
                            <h3>Detail Transaksi</h3>
                        </span>
                    </div>
                    <div class="float-right">
                        <a
                            class="btn btn-primary"
                            href="{{ route('transaksi.cetak' , $tx->id_transaksi) }}"
                        >
                            Cetak</a
                        >
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm mb-5">
                        <tr>
                            <td style="width: 200px;">
                            <strong>Nama Pembeli</strong></td>
                            <td>: {{ $pembeli->nama_pembeli }}</td>
                        </tr>
                        <tr>
                            <td><strong>Alamat Pembeli</strong></td>
                            <td>: {{ $pembeli->alamat_pembeli }}</td>
                        </tr>
                        <tr>
                            <td><strong>Email Pembeli </strong></td>
                            <td>: {{ $pembeli->email }}</td>
                        </tr>
                        <tr>
                            <td><strong>Telepon Pembeli </strong></td>
                            <td>: {{ $pembeli->telepon }}</td>
                        </tr>
                    </table>
                    <table class="table table-sm mb-3">
                        <tr>
                            <td style="width: 200px;">
                            <strong>Metode Pembayaran</strong></td>
                            <td>: {{ $tx->metode_pembayaran }}</td>
                        </tr>
                        <tr>
                            <td><strong>Jumlah Pembelian</strong></td>
                            <td>: {{ $tx->jumlah_pembelian }} unit</td>
                        </tr>
                        <tr>
                            <td><strong>Harga Mobil</strong></td>
                            <td>: @php echo "Rp. " . number_format($mobil->harga) @endphp</td>
                        </tr>
                        <tr>
                            <td><strong>Total Pembayaran</strong></td>
                            <td>: @php echo "Rp. " . number_format($tx->total_pembayaran) @endphp</td>
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
                            <h3>Data Mobil</h3>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm mb-3">
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
                            <td><strong>Volume Mobil </strong></td>
                            <td>: {{ $mobil->volume_mobil }}</td>
                        </tr>
                        <tr>
                            <td><strong>Warna Mobil </strong></td>
                            <td>: {{ $mobil->warna }}</td>
                        </tr>
                    </table>

                    <img src="{{ URL::to('/foto_mobil/'. $mobil->foto) }}">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
