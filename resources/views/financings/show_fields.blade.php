<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nome') !!}
    {!! Form::text('name', isset($financing->name) ? $financing->name : '', ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Descrição') !!}
    {!! Form::text('description', isset($financing->description) ? $financing->description : '', ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Document Field -->
<div class="col-sm-6">
    {!! Form::label('document', 'Contrato') !!}
    {!! Form::text('document', isset($financing->document) ? $financing->document : '', ['class' => 'form-control', 'disabled']) !!}
</div>
