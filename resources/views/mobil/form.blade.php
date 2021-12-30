<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('merk') }}
            {{ Form::text('merk',$mobil->merk,
            ['class' => 'form-control' .
            ($errors->has('merk') ? ' is-invalid' : ''),
            'placeholder' => 'Merk Mobil']) }}
            {!! $errors->first('merk',
            '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
                {{ Form::label('seri') }}
                {{ Form::text('seri',$mobil->seri,
                ['class' => 'form-control' .
                ($errors->has('seri') ? ' is-invalid' : ''),
                'placeholder' => 'Seri Mobil']) }}
                {!! $errors->first('seri',
                '<div class="invalid-feedback">:message</p>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('harga') }}
            {{ Form::text('harga',$mobil->harga,
            ['class' => 'form-control' .
            ($errors->has('harga') ? ' is-invalid' : ''),
            'placeholder' => 'Harga Mobil']) }}
            {!! $errors->first('harga',
            '<div class="invalid-feedback">:message</p>') !!}
        </div>
    
        <div class="form-group">
            {{ Form::label('volume_mobil') }}
            {{ Form::text('volume_mobil',$mobil->volume_mobil,
            ['class' => 'form-control' .
            ($errors->has('volume_mobil') ? ' is-invalid' : ''),
            'placeholder' => 'Volume Mobil']) }}
            {!! $errors->first('volume_mobil',
            '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('warna') }}
            {{ Form::text('warna',$mobil->warna,
            ['class' => 'form-control' .
            ($errors->has('warna') ? ' is-invalid' : ''),
            'placeholder' => 'Warna Mobil']) }}
            {!! $errors->first('warna',
            '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-row">
            {{ Form::label('foto','Foto File (jpg)', ['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}

            <div class="col-sm-9">
                {{ Form::file('foto', null, ['class' => 'form-control' . ($errors->has('foto') ? ' is-invalid' : ''),'placeholder' => 'Foto']) }}
                {!! $errors->first('foto', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="col-sm-9">
                @if($mobil->foto)
                    <img id="original" src="{{ url('/foto_mobil/'.$mobil->foto) }}">
                @endif
            </div>
        </div>
        <br><br>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</div>