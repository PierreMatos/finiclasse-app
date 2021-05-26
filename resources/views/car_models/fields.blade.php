<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Make Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('make_id', 'Make Id:') !!}
    {!! Form::number('make_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Car Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('car_category_id', 'Car Category Id:') !!}
    {!! Form::number('car_category_id', null, ['class' => 'form-control']) !!}
</div>