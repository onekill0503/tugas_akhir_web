@extends('adminlte::page') @section('title', 'Daftar Mobil')
@section('content_header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            Daftar Mobil
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
                            <h3>Daftar Mobil</h3>
                        </span>
                        <div class="float-right">
                            @include('mobil.search',['url'=>'mobil', 'link'=>'mobil'])
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
                                    <th>No</th>
                                    <th>Merk Mobil</th>
                                    <th>Seri</th>
                                    <th>Harga</th>
                                    <th>Volume</th>
                                    <th>Warna</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Memulai nomor dari 1 -->
                                @php $i=1; @endphp
                                
                                @foreach ($mobil as $m)
                                <tr>
                                    <td>{{ +(+$i) }}</td>
                                    <td>{{ $m->merk }}</td>
                                    <td>{{ $m->seri }}</td>
                                    <td>Rp. {{ number_format($m->harga) }}</td>
                                    <td>{{ $m->volume_mobil }} &nbsp;&nbsp;<i class="fa fa-fw fa-users"></i></td>
                                    <td>{{ $m->warna }}</td>
                                    <td>
                                        <form
                                            action="{{ route('mobil.destroy',$m->id_mobil) }}"
                                            method="POST"
                                        >
                                            <a
                                                class="btn btn-sm btn-primary"
                                                href="{{ route('mobil.show',$m->id_mobil) }}"
                                            >
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                            <a
                                                class="btn btn-sm btn-success"
                                                href="{{ route('mobil.edit',$m->id_mobil) }}"
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
            {!! $mobil->links('pagination::bootstrap-4') !!}
        </div>
    </div>
</div>
@endsection
