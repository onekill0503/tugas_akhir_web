<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-row mb-2">
            {{ Form::label('nama_pembeli','Nama',['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
            <div class="col-sm-9">
                {{ Form::text('nama_pembeli', $pembeli->nama_pembeli, ['class' => 'form-control' . ($errors->has('nama_pembeli') ? ' is-invalid' : ''), 'placeholder' => 'Nama Pembeli']) }}
                {!! $errors->first('nama_pembeli', '<div class="invalid-feedback">:message</p>') !!}
            </div>
        </div>

        <div class="form-row mb-2">
            {{ Form::label('alamat_pembeli','Alamat',['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
            <div class="col-sm-9">
                {{ Form::text('alamat_pembeli', $pembeli->alamat_pembeli, ['class' => 'form-control' . ($errors->has('alamat_pembeli') ? ' is-invalid' : ''), 'placeholder' => 'Alamat Pembeli']) }}
                {!! $errors->first('alamat_pembeli', '<div class="invalid-feedback">:message</p>') !!}
            </div>
        </div>

        <div class="form-row mb-2">
            {{ Form::label('email','Email',['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
            <div class="col-sm-9">
                {{ Form::text('email', $pembeli->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email Pembeli']) }}
                {!! $errors->first('email', '<div class="invalid-feedback">:message</p>') !!}
            </div>
        </div>

        <div class="form-row mb-2">
            {{ Form::label('telepon','Telepon',['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
            <div class="col-sm-9">
                {{ Form::text('telepon', $pembeli->telepon, ['class' => 'form-control' . ($errors->has('telepon') ? ' is-invalid' : ''), 'placeholder' => 'Telepon Pembeli']) }}
                {!! $errors->first('telepon', '<div class="invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <hr>
        <div class="form-row mb-2">
            {{ Form::label('id_mobil','Mobil',['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
            <div class="col-sm-9">
                {{ Form::select('id_mobil', $mobil , $transaksi->id_mobil , ['id'=>'id_mobil','class' => 'form-control' . ($errors->has('metode_pembayaran') ? ' is-invalid' : ''), 'placeholder' => '--- pilih Mobil ---']) }}
                {!! $errors->first('id_mobil','<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <hr>
        <div class="form-row mb-2">
            {{ Form::label('metode_pembayaran','Telepon',['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
            <div class="col-sm-9">
                {{ Form::select('metode_pembayaran',['Bank' => 'Bank' , 'COD' => 'Cash on Delivery' , 'E-Wallet' => 'E-Wallet'], $transaksi->metode_pembayaran , ['id'=>'metode_pembayaran','class' => 'form-control' . ($errors->has('metode_pembayaran') ? ' is-invalid' : ''), 'placeholder' => '--- pilih metode pembayaran ---']) }}
                {!! $errors->first('metode_pembayaran','<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <div class="form-row mb-2">
            {{ Form::label('jumlah_pembelian','Jumlah Unit',['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
            <div class="col-sm-9">
                {{ Form::number('jumlah_pembelian', $transaksi->jumlah_pembelian, ['class' => 'form-control' . ($errors->has('jumlah_pembelian') ? ' is-invalid' : ''), 'placeholder' => 'Jumlah Unit Pembelian']) }}
                {!! $errors->first('jumlah_pembelian', '<div class="invalid-feedback">:message</p>') !!}
            </div>
        </div>
        
        <br><br>
    </div>
    <div class="box-footer mt20 float-right">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</div>