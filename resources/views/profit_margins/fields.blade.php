<!-- Make Id Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('make_id', 'Make Id:') !!}
    {!! Form::select('make_id', ['' => ''], null, ['class' => 'form-control custom-select']) !!}
</div> -->

<!-- Make Name Field -->
<div class="form-group col-md-3">
    {!! Form::label('make_id', 'Marca') !!}
    <select name="make_id" class="input-group form-control custom-select selectedPost" id="make_id">
        <option selected value="">--</option>
        @foreach ($carData['makes'] as $make)
            @if ($make->id == (isset($car->model->make->id) ? $car->model->make->id : ''))
                <option selected value="{{ $car->model->make->id }}">{{ $car->model->make->name }}
                </option>
            @else
                <option value="{{ $make->id }}">{{ $make->name }}</option>
            @endif
        @endforeach
    </select>
</div>

<!-- Car Fuel Id Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('car_fuel_id', 'Car Fuel Id:') !!}
    {!! Form::select('car_fuel_id', ['' => ''], null, ['class' => 'form-control custom-select']) !!}
</div> -->

<!-- Fuel Id Field -->
<div class="form-group col-md-3">
    {!! Form::label('car_fuel_id', 'Combustível') !!}
    <select name="car_fuel_id" class="input-group form-control custom-select selectedPost">
        @foreach ($carData['fuels'] as $fuel)
            @if ($fuel->id == (isset($car->fuel->id) ? $car->fuel->id : ''))
                <option selected value="{{ $fuel->id }}">{{ $fuel->name }}</option>
            @else
                <option value="{{ $fuel->id }}">{{ $fuel->name }}</option>
            @endif
        @endforeach
    </select>
</div>

<!-- Car Category Id Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('car_category_id', 'Car Category Id:') !!}
    {!! Form::select('car_category_id', ['' => ''], null, ['class' => 'form-control custom-select']) !!}
</div> -->

<!-- Category Id Field -->
<div class="form-group col-md-3">
    {!! Form::label('car_category_id', 'Categoria') !!}
    <select name="car_category_id" class="input-group form-control custom-select selectedPost">
        @foreach ($carData['categories'] as $category)
            @if ($category->id == (isset($car->category->id) ? $car->category->id : ''))
                <option selected value="{{ $category->id }}">{{ $category->name }}</option>
            @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
        @endforeach
    </select>
</div>

<!-- Level 1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('level_1', 'Level 1:') !!}
    {!! Form::number('level_1', null, ['class' => 'form-control']) !!}
</div>

<!-- Level 2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('level_2', 'Level 2:') !!}
    {!! Form::number('level_2', null, ['class' => 'form-control']) !!}
</div>

<!-- Level 3 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('level_3', 'Level 3:') !!}
    {!! Form::number('level_3', null, ['class' => 'form-control']) !!}
</div>