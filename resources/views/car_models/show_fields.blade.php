<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $carModel->name }}</p>
</div>

<!-- Make Id Field -->
<div class="col-sm-12">
    {!! Form::label('make_id', 'Make Id:') !!}
    <p>{{ $carModel->make_id }}</p>
</div>

<!-- Car Category Id Field -->
<div class="col-sm-12">
    {!! Form::label('car_category_id', 'Car Category Id:') !!}
    <p>{{ $carModel->car_category_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $carModel->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $carModel->updated_at }}</p>
</div>

