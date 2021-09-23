<!-- Name Field -->
<div class="form-group col-sm-4">
    <label>{{ __('Name') }}</label>
    {!! Form::text('name', isset($user->name) ? $user->name : '' , ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-4">
    <label>{{ __('Email') }}</label>
    {!! Form::email('email', isset($user->email) ? $user->email : '' , ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-4">
    <label>{{ __('City') }}</label>
    {!! Form::text('city', isset($user->city) ? $user->city : '' , ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Adress Field -->
<div class="form-group col-sm-4">
    <label>{{ __('Address') }}</label>
    {!! Form::text('adress', isset($user->adress) ? $user->adress : '' , ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Zip Code Field -->
<div class="form-group col-sm-4">
    <label>{{ __('Zip Code') }}</label>
    {!! Form::text('zip_code', isset($user->zip_code) ? $user->zip_code : '' , ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-4">
    <label>{{ __('Phone') }}</label>
    {!! Form::number('phone', isset($user->phone) ? $user->phone : '' , ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Mobile Phone Field -->
<div class="form-group col-sm-4">
    <label>{{ __('Mobile Phone') }}</label>
    {!! Form::number('mobile_phone', isset($user->mobile_phone) ? $user->mobile_phone : '' , ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Nif Field -->
<div class="form-group col-sm-4">
    <label>{{ __('NIF') }}</label>
    {!! Form::number('nif', isset($user->nif) ? $user->nif : '' , ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Gdpr Type Field -->
<div class="form-group col-sm-4">
    <label>{{ __('Gdpr Type') }}</label>
    {!! Form::text('gdpr_type', isset($user->gdpr_type) ? $user->gdpr_type : '' , ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Stand Id Field -->
<div class="form-group col-sm-4">
    <label>{{ __('Stand') }}</label>
    {!! Form::text('stand_id', isset($user->stand->name) ? $user->stand->name : '' , ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Service Car Field -->
<div class="form-group col-sm-4">
    <label>{{ __('Service Car') }}</label>
    {!! Form::text('service_car_id', isset($user->serviceCar->plate) ? $user->serviceCar->plate : '' , ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Finiclasse Employee Field -->
<div class="form-group col-sm-4">
    <div class="form-check" style="margin-top: 37px;">
        <input type="hidden" name="finiclasse_employee" value="0" disabled>
        <input type="checkbox" name="finiclasse_employee" value="1" {{ ($user->finiclasse_employee == "1" ? ' checked' : '') }} disabled>
        <label>{{ __('Finiclasse Employee') }}</label>
    </div>
</div>

