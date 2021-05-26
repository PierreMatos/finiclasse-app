<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- Adress Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adress', 'Adress:') !!}
    {!! Form::text('adress', null, ['class' => 'form-control']) !!}
</div>

<!-- Zip Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zip_code', 'Zip Code:') !!}
    {!! Form::text('zip_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Mobile Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile_phone', 'Mobile Phone:') !!}
    {!! Form::number('mobile_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Nif Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nif', 'Nif:') !!}
    {!! Form::number('nif', null, ['class' => 'form-control']) !!}
</div>

<!-- Gdpr Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gdpr_type', 'Gdpr Type:') !!}
    {!! Form::text('gdpr_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Finiclasse Employee Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('finiclasse_employee', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('finiclasse_employee', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('finiclasse_employee', 'Finiclasse Employee', ['class' => 'form-check-label']) !!}
    </div>
</div>
