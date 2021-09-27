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
@if (Route::is('users.create'))
    <div class="form-group col-sm-4 gdprDiv">
        <label>{{ __('Gdpr Type') }}</label>
        <div>
            <label class="radio inline">
                {!! Form::radio('gdpr_type', 'email') !!}
                Email
            </label>
            <label class="radio inline gdprLabel">
                {!! Form::radio('gdpr_type', 'sms') !!}
                SMS
            </label>
        </div>
    </div>
@endif

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

<!-- Client Type Field -->
<div class="form-group col-md-4">
    <label>{{ __('Client Type') }}</label>
    <select name="client_type_id" class="input-group form-control custom-select selectedPost">
        <option selected value="">--</option>
        @foreach ($userData['clientTypes'] as $clientType)
            <!--condition make selecionado anteriormente-->
            @if ($clientType->id == (isset($user->clientType->id) ? $user->clientType->id : ''))
                <option selected value="{{ $clientType->id }}">{{ $clientType->name }}</option>
            @else
                <option value="{{ $clientType->id }}">{{ $clientType->name }}</option>
            @endif
        @endforeach
    </select>
</div>

<!-- Vendor lead Field -->
<div class="form-group col-md-4">
    <label>{{ __('Lead') }}</label>
    <select name="vendor_id" class="input-group form-control custom-select selectedPost">
        <option selected value="">--</option>
        @foreach ($userData['leads'] as $leads)
            <!--condition make selecionado anteriormente-->
            @if ($leads->id == (isset($user->vendor) ? $user->vendor->first()->id : ''))
                <option selected value="{{$user->vendor->first()->id }}">{{ $user->vendor->first()->name }}</option>
            @else
                <option value="{{ $leads->id }}">{{ $leads->name }}</option>
            @endif
        @endforeach
    </select>
</div>

<!-- Finiclasse Employee Field -->
<input type="hidden" name="finiclasse_employee" value="0">
