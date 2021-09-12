<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="proposal-tab" data-toggle="tab" href="#proposal" role="tab" aria-controls="proposal" aria-selected="true">Proposta</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="client-tab" data-toggle="tab" href="#client" role="tab" aria-controls="client" aria-selected="false">Cliente</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="cars-tab" data-toggle="tab" href="#cars" role="tab" aria-controls="cars" aria-selected="false">Viaturas</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="tradein-tab" data-toggle="tab" href="#tradein" role="tab" aria-controls="tradein" aria-selected="false">Retoma</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="financings-tab" data-toggle="tab" href="#financings" role="tab" aria-controls="financings" aria-selected="false">Financiamento</a>
  </li>
</ul>


<!-- Tab panes -->
<div class="tab-content mt-2 container">
        
    <div class="tab-pane active" id="proposal" role="tabpanel" aria-labelledby="proposal-tab">
        <div class="row">
        </div>
    </div>

    <div class="tab-pane" id="client" role="tabpanel" aria-labelledby="client-tab">
        <div class="row">

            <!-- Client Name Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_name', 'Client Name:') !!}
                {!! Form::text('client_name', $proposal->client->name ? $proposal->client->name  : 'null' , ['class' => 'form-control','disabled']) !!}
            </div>

            <!-- Client Email Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_email', 'Client Email:') !!}
                {!! Form::text('client_email', $proposal->client->email ? $proposal->client->email  : 'null' , ['class' => 'form-control','disabled']) !!}
            </div>

            <!-- Client Type Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_type', 'Client Type:') !!}
                {!! Form::text('client_type', $proposal->client->type ? $proposal->client->type  : 'null' , ['class' => 'form-control','disabled']) !!}
            </div>

            <!-- Client City Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_city', 'Cidade:') !!}
                {!! Form::text('client_city', $proposal->client->city ? $proposal->client->city  : 'null' , ['class' => 'form-control','disabled']) !!}
            </div>

            <!-- Client Adress Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_adress', 'Morada:') !!}
                {!! Form::text('client_adress', $proposal->client->adress ? $proposal->client->adress  : 'null' , ['class' => 'form-control','disabled']) !!}
            </div>

            <!-- Client Zip Code Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_zip_code', 'Cod Postal:') !!}
                {!! Form::text('client_zip_code', $proposal->client->zip_code ? $proposal->client->zip_code  : 'null' , ['class' => 'form-control','disabled']) !!}
            </div>

            <!-- Client  Phone -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_phone', 'Telefone:') !!}
                {!! Form::text('client_phone', $proposal->client->phone ? $proposal->client->mobile_phone  : 'null' , ['class' => 'form-control','disabled']) !!}
            </div>

            <!-- Client Mobile Phone -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_mobile_phone', 'Telemovel:') !!}
                {!! Form::text('client_mobile_phone', $proposal->client->mobile_phone ? $proposal->client->mobile_mobile_phone  : 'null' , ['class' => 'form-control','disabled']) !!}
            </div>

        </div>
    </div>

    <div class="tab-pane" id="cars" role="tabpanel" aria-labelledby="cars-tab">
        <div class="row">

            <!-- Client Name Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_name', 'Client Name:') !!}
                {!! Form::text('client_name', $proposal->client->name ? $proposal->client->name  : 'null' , ['class' => 'form-control','disabled']) !!}
            </div>

            <!-- Client Email Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_email', 'Client Email:') !!}
                {!! Form::text('client_email', $proposal->client->email ? $proposal->client->email  : 'null' , ['class' => 'form-control','disabled']) !!}
            </div>

            <!-- Client Type Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_type', 'Client Type:') !!}
                {!! Form::text('client_type', $proposal->client->type ? $proposal->client->type  : 'null' , ['class' => 'form-control','disabled']) !!}
            </div>

            <!-- Client City Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_city', 'Cidade:') !!}
                {!! Form::text('client_city', $proposal->client->city ? $proposal->client->city  : 'null' , ['class' => 'form-control','disabled']) !!}
            </div>

            <!-- Client Adress Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_adress', 'Morada:') !!}
                {!! Form::text('client_adress', $proposal->client->adress ? $proposal->client->adress  : 'null' , ['class' => 'form-control','disabled']) !!}
            </div>

            <!-- Client Zip Code Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_zip_code', 'Cod Postal:') !!}
                {!! Form::text('client_zip_code', $proposal->client->zip_code ? $proposal->client->zip_code  : 'null' , ['class' => 'form-control','disabled']) !!}
            </div>

            <!-- Client  Phone -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_phone', 'Telefone:') !!}
                {!! Form::text('client_phone', $proposal->client->phone ? $proposal->client->mobile_phone  : 'null' , ['class' => 'form-control','disabled']) !!}
            </div>

            <!-- Client Mobile Phone -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_mobile_phone', 'Telemovel:') !!}
                {!! Form::text('client_mobile_phone', $proposal->client->mobile_phone ? $proposal->client->mobile_mobile_phone  : 'null' , ['class' => 'form-control','disabled']) !!}
            </div>

        </div>
    </div>



    <!-- Vendor Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('vendor_id', 'Vendor Id:') !!}
        {!! Form::number('vendor_id', null, ['class' => 'form-control', 'disabled']) !!}
    </div>

    <!-- Price Field -->
    <div class="form-group col-sm-4">
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
</div>