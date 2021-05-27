<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client Id:') !!}
    {!! Form::number('client_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Vendor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vendor_id', 'Vendor Id:') !!}
    {!! Form::number('vendor_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Pos Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pos_number', 'Pos Number:') !!}
    {!! Form::number('pos_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Prop Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prop_value', 'Prop Value:') !!}
    {!! Form::number('prop_value', null, ['class' => 'form-control']) !!}
</div>

<!-- First Contact Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_contact_date', 'First Contact Date:') !!}
    {!! Form::number('first_contact_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Contact Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_contact_date', 'Last Contact Date:') !!}
    {!! Form::number('last_contact_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Next Contact Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('next_contact_date', 'Next Contact Date:') !!}
    {!! Form::number('next_contact_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Contract Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contract', 'Contract:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('contract', ['class' => 'custom-file-input']) !!}
            {!! Form::label('contract', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>


<!-- Test Drive Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('test_drive', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('test_drive', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('test_drive', 'Test Drive', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- State Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state_id', 'State Id:') !!}
    {!! Form::number('state_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Business Study Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('business_study_id', 'Business Study Id:') !!}
    {!! Form::number('business_study_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Comment Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('comment', 'Comment:') !!}
    {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
</div>