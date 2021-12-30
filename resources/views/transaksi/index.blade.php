@extends('adminlte::page') @section('title', 'Daftar Transaksi Mobil')
@section('content_header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            Daftar Transaksi
        </li>
    </ol>
</nav>
@stop @section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div
                        style="
                            display: flex;
                            justify-content: space-between;
                            align-items: cente;
                        "
                    >
                        <span id="card_title">
                            <h3>Daftar Transaksi</h3>
                        </span>
                        <div class="float-right">
                            @include('transaksi.search',['url'=>'transaksi', 'link'=>'transaksi'])
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>Nama Pembeli</th>
                                    <th>Merk Mobil</th>
                                    <th>Seri</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Total Pembayaran</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Memulai nomor dari 1 -->
                                
                                @foreach ($tx as $t)
                                <tr>
                                    <td>{{ $t->nama_pembeli }}</td>
                                    <td>{{ $t->merk }}</td>
                                    <td>{{ $t->seri }}</td>
                                    <td>{{ $t->metode_pembayaran }}</td>
                                    <td>Rp. {{ number_format($t->total_pembayaran) }}</td>
                                    <td>
                                        <form
                                            action="{{ route('transaksi.destroy',$t->id_transaksi) }}"
                                            method="POST"
                                        >
                                            <a
                                                class="btn btn-sm btn-primary"
                                                href="{{ route('transaksi.show',$t->id_transaksi) }}"
                                            >
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                            <a
                                                class="btn btn-sm btn-success"
                                                href="{{ route('transaksi.edit',$t->id_transaksi) }}"
                                            >
                                                <i class="fa fa-fw fa-edit"></i>
                                            </a>
                                            @csrf @method('DELETE')
                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm"
                                            >
                                                <i
                                                    class="fa fa-fw fa-trash"
                                                ></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $tx->links('pagination::bootstrap-4') !!}
        </div>
    </div>
</div>
@endsection
