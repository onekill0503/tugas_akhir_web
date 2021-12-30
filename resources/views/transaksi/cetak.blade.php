@extends('adminlte::page')
@section('title', 'Riwayat Pangkat Pegawai')
@section('content_header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item"><a href="/transaksi">Transaksi</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$transaksi->id_transaksi}}</li>
    </ol>
</nav>
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between;align-items: center;">
                        <span id="card_title">
                            <h3>Transaksi Pembelian Mobil</h3>
                        </span>
                        
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <font size="4" face="Arial">
                    <table style="width:100%; background-color:#ffa;" class="mt-2 mb-2">
                        <tr>
                            <td>Nama Pembeli </td>
                            <td> : {{ $pembeli->nama_pembeli }} </td>
                        </tr>
                        <tr>
                            <td>Alamat Pembeli </td>
                            <td> : {{ $pembeli->alamat_pembeli }} </td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td> : {{ $pembeli->telepon}} </td>
                        </tr>
                        <tr>
                            <td>Merk Mobil</td>
                            <td> : {{$mobil->merk }}
                            </td>
                        </tr>
                        <tr>
                            <td>Seri Mobil</td>
                            <td> : {{$mobil->seri }}
                            </td>
                        </tr>
                        <tr>
                            <td>Volume</td>
                            <td> : {{$mobil->volume_mobil }}
                            </td>
                        </tr>
                        <tr>
                            <td>Warna Mobil</td>
                            <td> : {{$mobil->warna }}
                            </td>
                        </tr>
                        <tr>
                            <td>Harga Mobil</td>
                            <td> : {{ number_format($mobil->harga) }}
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah Pembelian (unit)</td>
                            <td> : {{$transaksi->jumlah_pembelian }}
                            </td>
                        </tr>
                        <tr>
                            <td>Total Pembayaran</td>
                            <td> : {{ number_format($transaksi->total_pembayaran) }}
                            </td>
                        </tr>
                        <tr>
                            <td>Metode Pembayaran</td>
                            <td> : {{$transaksi->metode_pembayaran }}
                            </td>
                        </tr>
                    </table>
                </font>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection