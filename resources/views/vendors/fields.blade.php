<!-- Name Field -->
<div class="form-group col-sm-4">
    <label>{{ __('Name') }}</label>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-4">
    <label>{{ __('Email') }}</label>
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-4">
    <label>{{ __('City') }}</label>
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- Adress Field -->
<div class="form-group col-sm-4">
    <label>{{ __('Address') }}</label>
    {!! Form::text('adress', null, ['class' => 'form-control']) !!}
</div>

<!-- Zip Code Field -->
<div class="form-group col-sm-4">
    <label>{{ __('Zip Code') }}</label>
    {!! Form::text('zip_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-4">
    <label>{{ __('Phone') }}</label>
    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Mobile Phone Field -->
<div class="form-group col-sm-4">
    <label>{{ __('Mobile Phone') }}</label>
    {!! Form::number('mobile_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Nif Field -->
<div class="form-group col-sm-4">
    <label>{{ __('NIF') }}</label>
    {!! Form::number('nif', null, ['class' => 'form-control']) !!}
</div>

<!-- Gdpr Type Field -->
<div class="form-group col-sm-4">
    <label>{{ __('Gdpr Type') }}</label>
    {!! Form::text('gdpr_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Stand Id Field -->
<div class="form-group col-md-4">
    <label>{{ __('Stand') }}</label>
    <select name="stand_id" class="input-group form-control custom-select selectedPost">
        <option selected value="">--</option>
        @foreach ($userData['stands'] as $stand)
            <!--condition make selecionado anteriormente-->
            @if ($stand->id == (isset($user->stand->id) ? $user->stand->id : ''))
                <option selected value="{{ $stand->id }}">{{ $stand->name }}</option>
            @else
                <option value="{{ $stand->id }}">{{ $stand->name }}</option>
            @endif
        @endforeach
    </select>
</div>

<!-- Service Car Field -->
<div class="form-group col-md-4">
    <label>{{ __('Service Car') }}</label>
    <select name="service_car_id" class="input-group form-control custom-select selectedPost">
        <option selected value="">--</option>
        @foreach ($userData['cars'] as $serviceCar)
            <!--condition make selecionado anteriormente-->
            @if ($serviceCar->id == (isset($user->serviceCar->id) ? $user->serviceCar->id : ''))
                <option selected value="{{ $serviceCar->id }}">{{ $serviceCar->plate }}</option>
            @else
                <option value="{{ $serviceCar->id }}">{{ $serviceCar->plate }}</option>
            @endif
        @endforeach
    </select>
</div>

<!-- Finiclasse Employee Field -->
<div class="form-group col-sm-4">
    <div class="form-check" style="margin-top: 37px;">
        {!! Form::hidden('finiclasse_employee', 0, null, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('finiclasse_employee', '1', ['class' => 'form-check-input']) !!}
        <label>{{ __('Finiclasse Employee') }}</label>
    </div>
</div>
