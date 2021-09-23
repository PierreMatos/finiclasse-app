<!-- Tab panes -->
<div class="tab-content mt-2 container">

    <div class="tab-pane active" id="clients" role="tabpanel" aria-labelledby="client-tab">
        <div class="row">

            <!-- Client Name Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_name', 'Nome do cliente') !!}
                {!! Form::text('client_name', isset($proposal->client->name) ? $proposal->client->name : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Client Email Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_email', 'E-mail') !!}
                {!! Form::text('client_email', isset($proposal->client->email) ? $proposal->client->email : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Client Type Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_type', 'Tipo') !!}
                {!! Form::text('client_type', isset($proposal->client->type) ? $proposal->client->type : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Client City Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_city', 'Cidade') !!}
                {!! Form::text('client_city', isset($proposal->client->city) ? $proposal->client->city : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Client Adress Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_adress', 'Morada') !!}
                {!! Form::text('client_adress', isset($proposal->client->adress) ? $proposal->client->adress : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Client Zip Code Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_zip_code', 'Código Postal') !!}
                {!! Form::text('client_zip_code', isset($proposal->client->zip_code) ? $proposal->client->zip_code : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Client  Phone -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_phone', 'Telefone') !!}
                {!! Form::text('client_phone', isset($proposal->client->phone) ? $proposal->client->mobile_phone : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Client Mobile Phone -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_mobile_phone', 'Telemóvel') !!}
                {!! Form::text('client_mobile_phone', isset($proposal->client->mobile_phone) ? $proposal->client->mobile_mobile_phone : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- NIF Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('nif', 'NIF:') !!}
                {!! Form::text('nif', isset($proposal->client->nif) ? $proposal->client->nif : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- First Contact Date Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('first_contact_date', 'Primeiro contato') !!}
                {!! Form::text('first_contact_date', isset($proposal->first_contact_date) ? $proposal->first_contact_date : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Last Contact Date Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('last_contact_date', 'Último contato') !!}
                {!! Form::text('last_contact_date', isset($proposal->last_contact_date) ? $proposal->last_contact_date : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Next Contact Date Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('next_contact_date', 'Próximo contato') !!}
                {!! Form::text('next_contact_date', isset($proposal->next_contact_date) ? $proposal->next_contact_date : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Comment Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('comment', 'Comentário') !!}
                {!! Form::textarea('comment', isset($proposal->comment) ? $proposal->comment : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Gdpr Confirmation Color Field -->
            <div class="form-group col-md-4">
                <div style="margin-top: 37px;">
                    <input type="hidden" name="gdpr_confirmation" value="0" disabled>
                    <input type="checkbox" name="gdpr_confirmation" value="1"
                        {{ isset($proposal->client->gdpr_confirmation) == '1' ? ' checked' : '' }} disabled>
                    <label>Confirmação GDPR</label>
                </div>
            </div>

        </div>
    </div>

    <div class="tab-pane" id="cars" role="tabpanel" aria-labelledby="cars-tab">
        <div class="row">

            <!-- Name Field & Image Field -->
            <div class="form-group col-sm-4" style="display: grid; text-align: center; justify-content: center;">
                @if ($proposal->car_id != '')
                    {!! Form::label('make_id', isset($proposal->car->model->make->name) ? $proposal->car->model->make->name : '') !!}
                    <img src="{{ $proposal->car->getFirstMediaUrl('cars', 'thumb') }}" style="max-width: 250px;" />
                @endif
            </div>

            <div class="form-group col-sm-8" style="display: flex;">
                <!-- Fuel Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('fuel_id', 'Combustível') !!}
                    {!! Form::text('fuel_id', isset($proposal->car->fuel->name) ? $proposal->car->fuel->name : '', ['class' => 'form-control', 'disabled']) !!}

                    <!-- State Id Field -->
                    <div class="form-group"></div>
                    {!! Form::label('state_id', 'Estado') !!}
                    {!! Form::text('state_id', isset($proposal->car->state->name) ? $proposal->car->state->name : '', ['class' => 'form-control', 'disabled']) !!}
                </div>

                <!-- Color Exterior Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('color_exterior', 'Cor exterior') !!}
                    {!! Form::text('color_exterior', isset($proposal->car->color_exterior) ? $proposal->car->color_exterior : '', ['class' => 'form-control', 'disabled']) !!}

                    <!-- Ano Id Field -->
                    <div class="form-group"></div>
                    {!! Form::label('registration', 'Ano') !!}
                    {!! Form::text('registration', isset($proposal->car->registration) ? $proposal->car->registration : '', ['class' => 'form-control', 'disabled']) !!}
                </div>
            </div>

            <div class="form-group col-sm-4"></div>
            <!-- Price Field -->
            <div class="form-group col-sm-8">
                <p>Preço Final (incl. IVA)</p>
                @if ($proposal->car_id != '')
                    <h2>@money($proposal->car->price)</h2>
                @endif
            </div>

        </div>
        <div style="float: right;">
            @if ($proposal->car_id != '')
                <a href="{{ route('cars.show', [$proposal->car->id]) }}">Ver tudo</a>
            @endif
        </div>
    </div>

    <div class="tab-pane" id="tradeins" role="tabpanel" aria-labelledby="tradein-tab">
        <div class="row">

            <!-- Name Field & Image Field -->
            <div class="form-group col-sm-4" style="display: grid; text-align: center; justify-content: center;">
                @if ($proposal->tradein_id != '')
                    {!! Form::label('make_id', isset($proposal->tradein->model->make->name) ? $proposal->tradein->model->make->name : '') !!}
                    <img src="{{ $proposal->tradein->getFirstMediaUrl('cars', 'thumb') }}"
                        style="max-width: 250px;" />
                @endif
            </div>

            <div class="form-group col-sm-8" style="display: flex;">
                <!-- Fuel Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('fuel_id', 'Combustível') !!}
                    {!! Form::text('fuel_id', isset($proposal->tradein->fuel->name) ? $proposal->tradein->fuel->name : '', ['class' => 'form-control', 'disabled']) !!}

                    <!-- State Id Field -->
                    <div class="form-group"></div>
                    {!! Form::label('state_id', 'Estado') !!}
                    {!! Form::text('state_id', isset($proposal->tradein->state->name) ? $proposal->tradein->state->name : '', ['class' => 'form-control', 'disabled']) !!}
                </div>

                <!-- Color Exterior Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('color_exterior', 'Cor exterior') !!}
                    {!! Form::text('color_exterior', isset($proposal->tradein->color_exterior) ? $proposal->tradein->color_exterior : '', ['class' => 'form-control', 'disabled']) !!}

                    <!-- Ano Id Field -->
                    <div class="form-group"></div>
                    {!! Form::label('registration', 'Ano') !!}
                    {!! Form::text('registration', isset($proposal->tradein->registration) ? $proposal->tradein->registration : '', ['class' => 'form-control', 'disabled']) !!}
                </div>
            </div>

            <div class="form-group col-sm-4"></div>
            <div class="form-group col-sm-8" style="display: flex;">
                <!-- Tradein Purchase Field -->
                <div class="form-group col-sm-6">
                    <p>Preço de compra</p>
                    @if ($proposal->tradein_id != '')
                        <h2>@money($proposal->tradein->tradein_purchase)</h2>
                        <div class="form-group col-sm-4">
                            {!! Form::text('tradein_purchase', isset( $proposal->tradein->tradein_purchase) ?  $proposal->tradein->tradein_purchase : '', ['class' => 'form-control', 'id'=>'tradein_purchase']) !!}
                        </div>
                    @endif

                    <!-- Tradein sale Field -->
                    <div class="form-group"></div>
                    <p>Preço de venda</p>
                    @if ($proposal->tradein_id != '')
                        <h2>@money($proposal->tradein->tradein_sale)</h2>
                    @endif
                </div>
            </div>
        </div>

        <div style="float: right;">

        <button type="button" id="{{isset($proposal->tradein->id) ? $proposal->tradein->id : '' }}" value="3" class="trade btn btn-info" > Aceitar</button>
        <button type="button" id="{{isset($proposal->tradein->id) ? $proposal->tradein->id : ''}}" value="0" class="trade btn btn-info" > Rejeitar</button>

            @if ($proposal->tradein_id != '')
                <a href="{{ route('cars.show', [$proposal->tradein->id]) }}">Ver tudo</a>
            @endif
        </div>
    </div>

    <div class="tab-pane" id="financings" role="tabpanel" aria-labelledby="financings-tab">
        <div class="row">

            <!-- Financial Type Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('name', 'Tipo de financiamento') !!}
                {!! Form::text('name', isset($proposal->financings->name) ? $proposal->financings->name : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Financial Description Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('description', 'Descrição') !!}
                {!! Form::text('description', isset($proposal->financings->description) ? $proposal->financings->description : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Contract Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('contract', 'Contrato') !!}
                <div class="input-group">
                    <div class="custom-file">
                        {!! Form::file('contract', ['class' => 'custom-file-input']) !!}
                        {!! Form::label('contract', 'Choose file', ['class' => 'custom-file-label']) !!}
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

        </div>
    </div>

    <div class="tab-pane" id="proposals" role="tabpanel" aria-labelledby="proposals-tab">
        <div class="row">

            <!-- Proposal Value Field -->
            <div class="form-group col-sm-4">
                <p>Valor do negócio</p>
                <h2>@money($proposal->prop_value)</h2>
            </div>

            <!-- Financial Value Field -->
            <div class="form-group col-sm-4">
                <p>Valor do financiamento</p>
                <h2>@money($proposal->prop_value)</h2>
            </div>

            <!-- Tradein Value Field -->
            <div class="form-group col-sm-4">
                <p>Valor da retoma</p>
                <h2>@money($proposal->prop_value)</h2>
            </div>

            <!-- Proposal Number Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('pos_number', 'Nº da proposta') !!}
                {!! Form::text('pos_number', isset($proposal->pos_number) ? $proposal->pos_number : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- First Contact Date Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('first_contact_date', 'Primeiro contato') !!}
                {!! Form::text('first_contact_date', isset($proposal->first_contact_date) ? $proposal->first_contact_date : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Last Contact Date Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('last_contact_date', 'Último contato') !!}
                {!! Form::text('last_contact_date', isset($proposal->last_contact_date) ? $proposal->last_contact_date : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Next Contact Date Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('next_contact_date', 'Próximo contato') !!}
                {!! Form::text('next_contact_date', isset($proposal->next_contact_date) ? $proposal->next_contact_date : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Test Drive Field -->
            <div class="form-group col-sm-4">
                <div style="margin-top: 37px;">
                    <input type="hidden" name="test_drive" value="0" disabled>
                    <input type="checkbox" name="test_drive" value="1"
                        {{ isset($proposal->test_drive) == '1' ? ' checked' : '' }} disabled>
                    <label>Teste drive</label>
                </div>
            </div>

        </div>
    </div>
</div>
