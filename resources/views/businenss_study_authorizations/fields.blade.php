<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Min Field -->
<div class="form-group col-sm-6">
    {!! Form::label('min', 'Min:') !!}
    {!! Form::number('min', null, ['class' => 'form-control']) !!}
</div>

<!-- Max Field -->
<div class="form-group col-sm-6">
    {!! Form::label('max', 'Max:') !!}
    {!! Form::number('max', null, ['class' => 'form-control']) !!}
</div>

<!-- Responsible Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsible_id', 'Responsible Id:') !!}
    {!! Form::number('responsible_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Color Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color', 'Color:') !!}
    {!! Form::text('color', null, ['class' => 'form-control']) !!}
</div>