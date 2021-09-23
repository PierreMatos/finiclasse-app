<!-- Client Id Field -->
<div class="col-sm-12">
    {!! Form::label('client_id', 'Client Id:') !!}
    <p>{{ $proposal->client_id }}</p>
</div>

<!-- Vendor Id Field -->
<div class="col-sm-12">
    {!! Form::label('vendor_id', 'Vendor Id:') !!}
    <p>{{ $proposal->vendor_id }}</p>
</div>

<!-- Price Field -->
<div class="col-sm-12">
    {!! Form::label('price', 'Price:') !!}
    <p>@money($proposal->price)</p>
</div>

<!-- Pos Number Field -->
<div class="col-sm-12">
    {!! Form::label('pos_number', 'Pos Number:') !!}
    <p>{{ $proposal->pos_number }}</p>
</div>

<!-- Prop Value Field -->
<div class="col-sm-12">
    {!! Form::label('prop_value', 'Prop Value:') !!}
    <p>{{ $proposal->prop_value }}</p>
</div>

<!-- First Contact Date Field -->
<div class="col-sm-12">
    {!! Form::label('first_contact_date', 'First Contact Date:') !!}
    <p>{{ $proposal->first_contact_date }}</p>
</div>

<!-- Last Contact Date Field -->
<div class="col-sm-12">
    {!! Form::label('last_contact_date', 'Last Contact Date:') !!}
    <p>{{ $proposal->last_contact_date }}</p>
</div>

<!-- Next Contact Date Field -->
<div class="col-sm-12">
    {!! Form::label('next_contact_date', 'Next Contact Date:') !!}
    <p>{{ $proposal->next_contact_date }}</p>
</div>

<!-- Contract Field -->
<div class="col-sm-12">
    {!! Form::label('contract', 'Contract:') !!}
    <p>{{ $proposal->contract }}</p>
</div>

<!-- Test Drive Field -->
<div class="col-sm-12">
    {!! Form::label('test_drive', 'Test Drive:') !!}
    <p>{{ $proposal->test_drive }}</p>
</div>

<!-- State Id Field -->
<div class="col-sm-12">
    {!! Form::label('state_id', 'State Id:') !!}
    <p>{{ $proposal->state_id }}</p>
</div>

<!-- Business Study Id Field -->
<div class="col-sm-12">
    {!! Form::label('business_study_id', 'Business Study Id:') !!}
    <p>{{ $proposal->business_study_id }}</p>
</div>

<!-- Comment Field -->
<div class="col-sm-12">
    {!! Form::label('comment', 'Comment:') !!}
    <p>{{ $proposal->comment }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $proposal->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $proposal->updated_at }}</p>
</div>

