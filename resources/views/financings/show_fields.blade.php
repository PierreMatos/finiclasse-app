<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nome') !!}
    {!! Form::text('name', isset($financing->name) ? $financing->name : '', ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Document Field -->
<div class="col-sm-6">
    {!! Form::label('document', 'Contrato') !!}
    <div class="form-control disabledColor">
        @foreach ($financing->getMedia('financings') as $media)
            <p>{{ $media->name }}</p>
        @endforeach
    </div>
</div>


<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Descrição') !!}
    {!! Form::textarea('description', isset($financing->description) ? $financing->description : '', ['class' => 'form-control', 'disabled']) !!}
</div>