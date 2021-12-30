@extends('adminlte::page') @section('title', 'Daftar Pembeli')
@section('content_header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            Daftar Pembeli
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
                            <h3>Daftar Pembeli</h3>
                        </span>
                        <div class="float-right">
                            @include('pembeli.search',['url'=>'pembeli', 'link'=>'pembeli'])
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
                                    <th>No.</th>
                                    <th>Nama Pembeli</th>
                                    <th>Alamat Pembeli</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Memulai nomor dari 1 -->
                                @php $i=1; @endphp
                                
                                @foreach ($tx as $p)
                                <tr>
                                    <td>{{ +(+$i) }}</td>
                                    <td>{{ $p->nama_pembeli }}</td>
                                    <td>{{ $p->alamat_pembeli }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>{{ $p->telepon }}</i></td>
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
