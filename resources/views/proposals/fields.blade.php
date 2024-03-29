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
                {!! Form::text('client_mobile_phone', isset($proposal->client->mobile_phone) ? $proposal->client->mobile_phone : '', ['class' => 'form-control', 'disabled']) !!}
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
            <div class="form-group col-sm-4">
                @if ($proposal->car_id != '')
                    <div style="display: flex;">
                        {!! Form::label('make_id', isset($proposal->car->model->make->name) ? $proposal->car->model->make->name : '') !!}
                        &nbsp;-&nbsp;
                        {!! Form::label('model_id', isset($proposal->car->model->name) ? $proposal->car->model->name : '') !!}
                    </div>
                    @if (!$proposal->car->getFirstMediaUrl('cars', 'thumb'))
                        <img src="/storage/images/noPhoto.jpg" style="max-width: 250px;" class="imgCar" />
                    @else
                        <img src="{{ $proposal->car->getFirstMediaUrl('cars', 'thumb') }}" style="max-width: 250px;"
                            class="imgCar" />
                    @endif
                    <!-- <img src="{{ $proposal->car->getFirstMediaUrl('cars', 'thumb') }}" style="max-width: 250px;" /> -->
                @endif
            </div>

            <div class="form-group col-sm-8">
                <div style="display: flex;">
                    <!-- Fuel Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('fuel_id', 'Combustível') !!}
                        {!! Form::text('fuel_id', isset($proposal->car->fuel->name) ? $proposal->car->fuel->name : '', ['class' => 'form-control', 'disabled']) !!}
                    </div>

                    <!-- Color Exterior Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('color_exterior', 'Cor exterior') !!}
                        {!! Form::text('color_exterior', isset($proposal->car->color_exterior) ? $proposal->car->color_exterior : '', ['class' => 'form-control', 'disabled']) !!}
                    </div>
                </div>

                <div style="display: flex;">
                    @if ( isset($proposal->car->state->id) === 5)
                        <!-- Komm Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('komm', 'Komm') !!}
                            {!! Form::text('komm', isset($proposal->car->komm) ? $proposal->car->komm : '', ['class' => 'form-control', 'disabled']) !!}
                        </div>
                    @else
                        <!-- Komm Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('motorization', 'Motorização') !!}
                            {!! Form::text('motorization', isset($proposal->car->motorization) ? $proposal->car->motorization : '', ['class' => 'form-control', 'disabled']) !!}
                        </div>
                    @endif

                    <!-- Variant Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('variant', 'Variante') !!}
                        {!! Form::text('variant', isset($proposal->car->variant) ? $proposal->car->variant : '', ['class' => 'form-control', 'disabled']) !!}
                    </div>
                </div>

                <div style="display: flex;">
                    <!-- State Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('state_id', 'Estado') !!}
                        {!! Form::text('state_id', isset($proposal->car->state) ? $proposal->car->state->name : '', ['class' => 'form-control', 'disabled']) !!}
                    </div>

                    <!-- Registration Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('registration', 'Ano') !!}
                        {!! Form::text('registration', $proposal->car->registration ?? false ? $proposal->car->registration->toDateString() : '', ['class' => 'form-control', 'disabled']) !!}
                    </div>
                </div>

                {{ $patient->datebirth ?? false ? $patient->datebirth->toDateString() : '' }}

                <div style="display: flex;">
                    <!-- POS PDF Field -->
                    <div class="form-group col-sm-6">
                        @if (isset($proposal->car->state->id) === 5)
                            @if ($proposal->car->getFirstMediaUrl('pos'))
                                <a href="{{ $proposal->car->getFirstMediaUrl('pos') }}" target="_blank"
                                    class="btn btn-default" style="margin-top: 10px;">Ver proposta de nova viatura
                                </a>
                            @else
                            @endif
                        @endif
                    </div>

                    <!-- Test Drive Field -->
                    <div class="form-group col-sm-6">
                        <div style="margin-top: 10px; float: right;">
                            {!! Form::label('test_drive', 'Teste drive') !!}
                            <!-- <label>Teste drive</label> -->
                            <input type="hidden" name="test_drive" value="0" disabled>
                            <input type="checkbox" name="test_drive" value="1"
                                {{ isset($proposal->test_drive) == '1' ? ' checked' : '' }} disabled>
                        </div>
                    </div>
                </div>

                <div style="display: flex; margin-top: 50px;">
                    @if (isset($proposal->car->state->id) === 5)
                        <!-- Base Price Field -->
                        <div class="form-group col-sm-8">
                            <p>Preço Base (incl. IVA)</p>
                            @if ($proposal->car_id != '')
                                <h2>@money($proposal->car->price_base)</h2>
                            @endif
                        </div>
                    @else
                        <!-- Price Field -->
                        <div class="form-group col-sm-8">
                            <p>Preço Final (incl. IVA)</p>
                            @if ($proposal->car_id != '')
                                <h2>@money($proposal->car->price)</h2>
                            @endif
                        </div>
                    @endif
                </div>

            </div>
            <div style="width: 100%;">
                @if ($proposal->car_id != '')
                    <a href="{{ route('cars.show', [$proposal->car->id]) }}" style="float: right;">Ver tudo</a>
                @endif
            </div>
        </div>
    </div>

    <div class="tab-pane" id="tradeins" role="tabpanel" aria-labelledby="tradein-tab">
        <div class="row">

            <!-- Name Field & Image Field -->
            <div class="form-group col-sm-12" style="text-align: center;">
                @if (!empty($proposal->tradein_id))
                    {!! Form::label('make_id', isset($proposal->tradein->model->make->name) ? $proposal->tradein->model->make->name : '') !!}
                    &nbsp;-&nbsp;
                    {!! Form::label('model_id', isset($proposal->tradein->model->name) ? $proposal->tradein->model->name : '') !!}
                @endif
            </div>
            <div class="form-group col-sm-12" style="text-align: center; margin-bottom: 30px;">
                @if (!empty($proposal->tradein_id))
                    <div>
                        @if (!$proposal->tradein->getFirstMediaUrl('cars'))
                            <img src="/storage/images/noPhoto.jpg" style="max-width: 250px;" class="imgCar" />
                        @else
                            @foreach ($proposal->tradein->getMedia('cars') as $media)
                                <img src="{{ $media->getUrl() }}" style="max-width: 250px;" class="imgCar" />
                            @endforeach
                        @endif
                    </div>
                @endif
            </div>

            <div class="form-group col-sm-12 retakeFields">
                <!-- Fuel Field -->
                <div class="form-group col-md-4">
                    {!! Form::label('fuel_id', 'Combustível') !!}
                    {!! Form::text('fuel_id', isset($proposal->tradein->fuel->name) ? $proposal->tradein->fuel->name : '', ['class' => 'form-control', 'disabled']) !!}

                    <!-- State Id Field -->
                    <div class="form-group"></div>
                    {!! Form::label('state_id', 'Estado') !!}
                    {!! Form::text('state_id', isset($proposal->tradein->state->name) ? $proposal->tradein->state->name : '', ['class' => 'form-control', 'disabled']) !!}
                
                    <!-- Potencial Buyer Field -->
                    <div class="form-group">
                        <div style="margin-top: 20px;">
                            {!! Form::label('potencial_buyer', 'Potencial comprador') !!}
                            <span>
                            <input type="hidden" name="potencial_buyer" value="0" disabled>
                            <input type="checkbox" name="potencial_buyer" value="1"
                                {{ isset($proposal->tradein->potencial_buyer) == '1' ? ' checked' : '' }} disabled>
                            </span>
                        </div>
                    </div>
                    
                </div>

                <!-- Color Exterior Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('color_exterior', 'Cor exterior') !!}
                    {!! Form::text('color_exterior', isset($proposal->tradein->color_exterior) ? $proposal->tradein->color_exterior : '', ['class' => 'form-control', 'disabled']) !!}

                    <!-- Ano Id Field -->
                    <div class="form-group"></div>
                    {!! Form::label('registration', 'Ano') !!}
                    {!! Form::text('registration', isset($proposal->tradein->registration) ? $proposal->tradein->registration : '', ['class' => 'form-control', 'disabled']) !!}
                </div>
                <!-- </div> -->

                <!-- <div class="form-group col-sm-8" style="display: flex;"> -->
                <!-- Color Exterior Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('km', 'Km') !!}
                    {!! Form::text('km', isset($proposal->tradein->km) ? $proposal->tradein->km : '', ['class' => 'form-control', 'disabled']) !!}

                    <!-- Ano Id Field -->
                    <div class="form-group"></div>
                    {!! Form::label('observations', 'Observações') !!}
                    {!! Form::text('observations', isset($proposal->tradein->observations) ? $proposal->tradein->observations : '', ['class' => 'form-control', 'disabled']) !!}
                </div>
            </div>

            <div class="form-group col-sm-12" style="display: flex; text-align: center; justify-content: center;">
                <!-- Tradein Purchase Field -->
                <div class="form-group col-sm-6">
                    <p>Preço de compra</p>
                    @if ($proposal->tradein_id != '')
                        <h2>@money($proposal->tradein->tradein_purchase)</h2>
                        @if ($proposal->tradein->state_id == 7)
                            <div class="form-group col-sm-6"
                                style="display: inline-flex; text-align: center; margin-top: 1rem;">
                                {!! Form::text('tradein_purchase', isset($proposal->tradein->tradein_purchase) ? $proposal->tradein->tradein_purchase : '', ['class' => 'form-control', 'id' => 'tradein_purchase']) !!}
                            </div>
                        @elseif($proposal->tradein->state_id == 8)
                            <div class="form-group col-sm-6" style="inline-flex; text-align: center; margin-top: 1rem;">
                                {!! Form::text('tradein_purchase', isset($proposal->tradein->tradein_purchase) ? $proposal->tradein->tradein_purchase : '', ['class' => 'form-control', 'id' => 'tradein_purchase', 'disabled']) !!}
                            </div>
                        @endif
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

        <div class="form-group col-sm-12" style="text-align: center;">

            @if ($proposal->tradein_id != '')
                @if ($proposal->tradein->state_id == 7)
                    <button type="button" id="{{ isset($proposal->tradein->id) ? $proposal->tradein->id : '' }}"
                        value="8" class="trade btn btn-info"> Aceitar</button>
                    <button type="button" id="{{ isset($proposal->tradein->id) ? $proposal->tradein->id : '' }}"
                        value="7" class="trade btn btn-info"> Rejeitar</button>
                @elseif($proposal->tradein->state_id == 8)
                    <button type="button" id="{{ isset($proposal->tradein->id) ? $proposal->tradein->id : '' }}"
                        value="8" class="trade btn btn-success" disabled> Aceitar</button>
                    <button type="button" id="{{ isset($proposal->tradein->id) ? $proposal->tradein->id : '' }}"
                        value="7" class="trade btn btn-info" disabled> Rejeitar</button>
                @endif
            @endif
            <br>
            @if ($proposal->tradein_id != '')
                <a href="{{ route('cars.show', [$proposal->tradein->id]) }}">Ver tudo</a>
            @endif
        </div>
    </div>

    <div class="tab-pane" id="campaigns" role="tabpanel" aria-labelledby="campaigns-tab">

        @foreach ($proposal->campaigns as $campaign)
            @if ($loop->first)
                <h4 class="mb-4">{{ $campaign->name }}</h4>
            @endif

            <div class="row">

                <!-- Name Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('Descrição') !!}
                    {!! Form::text('name', isset($campaign->pivot->name) ? $campaign->pivot->name : '', ['class' => 'form-control', 'readonly']) !!}
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label('Valor') !!}
                    {!! Form::text('value', isset($campaign->pivot->value) ? $campaign->pivot->value : '', ['class' => 'form-control', 'disabled']) !!}
                </div>

                <!-- Client Type Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('Tipo') !!}
                    {!! Form::text('type', isset($campaign->pivot->type) ? $campaign->pivot->type : '', ['class' => 'form-control', 'disabled']) !!}
                </div>
            </div>
        @endforeach

    </div>

    <div class="tab-pane" id="benefits" role="tabpanel" aria-labelledby="benefits-tab">

        @foreach ($proposal->benefits as $benefit)
            @if ($loop->first)
                <h4 class="mb-4">{{ $benefit->name }}</h4>
            @endif

            <div class="row">

                <!-- Name Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('Descrição') !!}
                    {!! Form::text('name', isset($benefit->pivot->name) ? $benefit->pivot->name : '', ['class' => 'form-control', 'readonly']) !!}
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label('Valor') !!}
                    {!! Form::text('value', isset($benefit->pivot->value) ? $benefit->pivot->value : '', ['class' => 'form-control', 'disabled']) !!}
                </div>

                <!-- Client Type Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('Tipo') !!}
                    {!! Form::text('type', isset($benefit->pivot->type) ? $benefit->pivot->type : '', ['class' => 'form-control', 'disabled']) !!}
                </div>
            </div>
        @endforeach

    </div>

    <div class="tab-pane" id="financings" role="tabpanel" aria-labelledby="financings-tab">
        {!! Form::model($financings, ['route' => 'financingProposals.store', 'method' => 'post', 'files' => true, 'enctype' => 'multipart/form-data']) !!}

        <div class="row">

            <input type="hidden" name="proposal_id" value="{{ $proposal->id }}" />

            @foreach ($financings as $financing)
                <input type="hidden" name="financing_id[]" value="{{ $financing->id }}" />

                <!-- {{ Form::hidden('financing_id', $financing->id, ['id' => $financing->id]) }} -->

                <!-- Financing -->
                <div class="form-group col-sm-1">
                    @if ($proposal->financings->contains('id', $financing->id))
                        <input id="checkbox{{ $financing->id }}" checked="checked" class="mt-5 checked"
                            name="checked" type="checkbox" value="{{ $financing->id }}" disabled>
                    @else
                        <input id="checkbox{{ $financing->id }}" name="checked" class="mt-5 checked"
                            type="checkbox" value="{{ $financing->id }}">
                    @endif
                </div>

                <!-- Financial Type Field -->
                <div class="form-group col-sm-7">
                    {!! Form::label('name', 'Tipo de financiamento') !!}
                    {!! Form::text('name', isset($financing->name) ? $financing->name : '', ['class' => 'form-control', 'disabled']) !!}
                </div>

                <!-- Financial Description Field -->
                <!-- <div class="form-group col-sm-4">
                {!! Form::label('description', 'Descrição') !!}
                {!! Form::text('description', isset($financing->description) ? $financing->description : '', ['class' => 'form-control', 'disabled']) !!}
                </div> -->

                <!-- Contract Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('contract', 'Contrato') !!}
                    <div style="display: flex;">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" id="doc{{ $financing->id }}"
                                    name="checked[{{ $financing->id }}]" multiple class="custom-file-input"
                                    disabled />
                                <label for="checked[{{ $financing->id }}]" class="custom-file-label">Adicione o
                                    documento</label>
                            </div>
                        </div>

                        @foreach ($financingsproposal as $financingproposal)
                            @if ($financingproposal->financing_id == $financing->id)
                                @if (!$financingproposal->getFirstMediaUrl('financingproposal'))
                                @endif

                                @if ($financingproposal->getFirstMediaUrl('financingproposal') !== '')
                                    <a href="{{ $financingproposal->getFirstMediaUrl('financingproposal') }}"
                                        target="_blank" class="btn btn-default"
                                        style="margin-left: 10px;">{{ __('Ver') }}</a>

                                    <div style="margin-left: 10px; margin-top: 5px;">
                                        <button onclick="removeFinancing({{ $financingproposal->id }})" type="submit"
                                            class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="clearfix"></div>
            @endforeach

            <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('proposals.index') }}" class="btn btn-default">{{ __('Cancel') }}</a>
            </div>
        </div>

        {!! Form::close() !!}
    </div>

    <div class="tab-pane" id="proposals" role="tabpanel" aria-labelledby="proposals-tab">

        <h4 class="mt-5 mb-5" style="text-align: center;">Estudo de negócio</h4>

        <div class="container borderContainer" @if($proposal->initialBusinessStudy->id) style="padding-bottom: 30px;" @endif>
            <div class="row justify-content-center">
                <div class="col-md-1"></div>
                <div class="col-sm-12 col-md-4">
                    <h6 class="form-group mt-3">
                        {!! Form::label('inicial', 'Inicial') !!}
                    </h6>

                    <div class="form-group">
                        <p>Diferença (€)</p>
                        <h2 class="borderBtn">@money($proposal->initialBusinessStudy->total_diff_amount)</h2>
                    </div>

                    <!-- Financial Value Field -->
                    <div class="form-group">
                        <p>Desconto (€)</p>
                        <h2 class="borderBtn">@money($proposal->initialBusinessStudy->total_discount_amount)
                        </h2>
                    </div>

                    <!-- Tradein Value Field -->
                    <div class="form-group">
                        <p>%</p>
                        <h2 class="borderBtn">@money($proposal->initialBusinessStudy->total_discount_perc)</h2>
                    </div>
                </div>

                <div class="col-md-1"></div>

                <div class="col-sm-12 col-md-4">
                    <h6 class="form-group mt-3">
                        {!! Form::label('final', 'Final') !!}
                    </h6>

                    <div class="form-group">
                        <p>Diferença (€)</p>
                        <h2 class="borderBtn">@money($proposal->finalBusinessStudy->total_diff_amount)</h2>
                    </div>

                    <!-- Financial Value Field -->
                    <div class="form-group">
                        <p>Desconto (€)</p>
                        <h2 class="borderBtn">@money($proposal->finalBusinessStudy->total_discount_amount)
                        </h2>
                    </div>

                    <!-- Tradein Value Field -->
                    <div class="form-group">
                        <p>%</p>
                        <h2 class="borderBtn">@money($proposal->finalBusinessStudy->total_discount_perc)</h2>
                    </div>
                </div>
            </div>

            @if (isset($proposal->initialBusinessStudy->id))
                @if ($proposal->state_id === 3)
                    <div class="row mt-5 justify-content-center">
                        <div class="form-group row" role="group" aria-label="Basic example">
                            <div class="col-6">
                                <button type="button"
                                    id="{{ isset($proposal->initialBusinessStudy->id) ? $proposal->initialBusinessStudy->id : '' }}"
                                    value="4" class="btn btn-success proposalRequestResponse">Aceitar</button>
                            </div>
                            <div class="col-6">
                                <button type="button"
                                    id="{{ isset($proposal->initialBusinessStudy->id) ? $proposal->initialBusinessStudy->id : '' }}"
                                    value="5" class="btn btn-danger proposalRequestResponse">Rejeitar</button>
                            </div>
                        </div>
                    </div>
                @endif
            @endif

            @if (isset($proposal->initialBusinessStudy->id))
                @if ($proposal->state_id === 1)
                    <div class="row mt-5 justify-content-center">
                        <div class="form-group row" role="group" aria-label="Basic example">
                            <div class="col-12">
                                @if($proposal->initialBusinessStudy->business_study_authorization_id === 4)
                                    <div class="alert alert-success" role="alert">
                                        O estudo de negócio foi aceite
                                    </div>
                                @elseif($proposal->initialBusinessStudy->business_study_authorization_id === 5)
                                    <div class="alert alert-danger" role="alert">
                                        O estudo de negócio foi rejeitado
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endif

        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <!-- INICIAL -->
                    <div class="form-group col-sm-8">
                        <!-- <p>Valor do negócio</p> -->
                        <h4 class="mt-3 mb-5">Valor Inicial</h4>
                    </div>

                    <!-- INICIAL -->
                    <div class="form-group col-sm-8">
                        <h6 style="font-weight: 700; line-height: 1.5;">Preço base</h6>
                        <p class="form-control studyBR" readonly>
                            @money($proposal->initialBusinessStudy->base_price)
                        </p>
                    </div>

                    <!-- INICIAL -->
                    <div class="form-group col-sm-8">
                        <h6 style="font-weight: 700; line-height: 1.5;">Total Extras</h6>
                        <p class="form-control studyBR" readonly>
                            @money($proposal->initialBusinessStudy->extras_total)
                        </p>
                    </div>

                    <!-- INICIAL -->
                    <div class="form-group col-sm-8">
                        <h6 style="font-weight: 700; line-height: 1.5;">PTL</h6>
                        <p class="form-control studyBR" readonly>@money($proposal->initialBusinessStudy->ptl)</p>
                    </div>

                    <!-- INICIAL -->
                    <div class="form-group col-sm-8">
                        <h6 style="font-weight: 700; line-height: 1.5;">SIGPU</h6>
                        <p class="form-control studyBR" readonly>@money($proposal->initialBusinessStudy->sigpu)</p>
                    </div>

                    <!-- INICIAL -->
                    <div class="form-group col-sm-8">
                        <h6 style="font-weight: 700; line-height: 1.5;">Total Transformação</h6>
                        <p class="form-control studyBR" readonly>
                            @money($proposal->initialBusinessStudy->total_transf)
                        </p>
                    </div>

                    <!-- INICIAL -->
                    <div class="form-group col-sm-8">
                        <h6 style="font-weight: 700; line-height: 1.5;">Total Apoios</h6>
                        <p class="form-control studyBR" readonly>
                            @money($proposal->initialBusinessStudy->total_benefits)</p>
                    </div>

                    <!-- INICIAL -->
                    <div class="form-group col-sm-8">
                        <h6 style="font-weight: 700; line-height: 1.5;">Total Extras 2</h6>
                        <p class="form-control studyBR" readonly>
                            @money($proposal->initialBusinessStudy->extras_total2)
                        </p>
                    </div>

                    <!-- INICIAL -->
                    <div class="form-group col-sm-8">
                        <h6 style="font-weight: 700; line-height: 1.5;">Sub Total</h6>
                        <p class="form-control studyBR" readonly>@money($proposal->initialBusinessStudy->sub_total)
                        </p>
                    </div>

                    <!-- INICIAL -->
                    <div class="form-group col-sm-8">
                        <h6 style="font-weight: 700; line-height: 1.5;">ISV</h6>
                        <p class="form-control studyBR" readonly>@money($proposal->initialBusinessStudy->isv)</p>
                    </div>

                    <!-- INICIAL -->
                    <div class="form-group col-sm-8">
                        <h6 style="font-weight: 700; line-height: 1.5;">IVA</h6>
                        <p class="form-control studyBR" readonly>@money($proposal->initialBusinessStudy->iva)</p>
                    </div>

                    <!-- INICIAL -->
                    <div class="form-group col-sm-8">
                        <h6 style="font-weight: 700; line-height: 1.5;">Total</h6>
                        <p class="form-control studyBR" readonly>@money($proposal->initialBusinessStudy->total)</p>
                    </div>

                    <!-- INICIAL -->
                    <div class="form-group col-sm-8">
                        <h6 style="font-weight: 700; line-height: 1.5;">Venda</h6>
                        <p class="form-control studyBR" readonly>@money($proposal->initialBusinessStudy->sell)</p>
                    </div>

                    <!-- INICIAL -->
                    <div class="form-group col-sm-8">
                        <h6 style="font-weight: 700; line-height: 1.5;">Valor de compra</h6>
                        <p class="form-control studyBR" readonly>
                            @money($proposal->initialBusinessStudy->purchase_price)</p>
                    </div>

                    <!-- INICIAL -->
                    <div class="form-group col-sm-8">
                        <h6 style="font-weight: 700; line-height: 1.5;">Valor de venda</h6>
                        <p class="form-control studyBR" readonly>
                            @money($proposal->initialBusinessStudy->selling_price)
                        </p>
                    </div>

                    <!-- INICIAL -->
                    <div class="form-group col-sm-8">
                        <h6 style="font-weight: 700; line-height: 1.5;">Diferença de retoma</h6>
                        <p class="form-control studyBR" readonly>
                            @money($proposal->initialBusinessStudy->total_diff_amount)
                        </p>
                    </div>

                    <!-- INICIAL -->
                    <div class="form-group col-sm-8">
                        <h6 style="font-weight: 700; line-height: 1.5;">Preço a liquidar</h6>
                        <p class="form-control studyBR" readonly>
                            @money($proposal->initialBusinessStudy->settle_amount)
                        </p>
                    </div>

                </div>

                <div class="col-sm-12 col-md-6">
                    <!-- FINAL -->
                    <div class="form-group col-sm-8 fr">
                        <!-- <p>Valor do financiamento</p> -->
                        <h4 class="mt-3 mb-5">Valor Final</h4>
                    </div>

                    <!-- FINAL -->
                    <div class="form-group col-sm-8 fr">
                        {!! Form::label('base_price', 'Preço base') !!}
                        {!! Form::text('base_price', isset($proposal->finalBusinessStudy->base_price) ? $proposal->finalBusinessStudy->base_price : '', ['class' => 'form-control studyBR']) !!}
                    </div>

                    <!-- FINAL -->
                    <div class="form-group col-sm-8 fr">
                        {!! Form::label('extras_total', 'Total Extras') !!}
                        {!! Form::text('extras_total', isset($proposal->finalBusinessStudy->extras_total) ? $proposal->finalBusinessStudy->extras_total : '', ['class' => 'form-control studyBR']) !!}
                    </div>

                    <!-- FINAL -->
                    <div class="form-group col-sm-8 fr">
                        {!! Form::label('ptl', 'PTL') !!}
                        {!! Form::text('ptl', isset($proposal->finalBusinessStudy->ptl) ? $proposal->finalBusinessStudy->ptl : '', ['class' => 'form-control studyBR']) !!}
                    </div>

                    <!-- FINAL -->
                    <div class="form-group col-sm-8 fr">
                        {!! Form::label('sigpu', 'SIGPU') !!}
                        {!! Form::text('sigpu', isset($proposal->finalBusinessStudy->sigpu) ? $proposal->finalBusinessStudy->sigpu : '', ['class' => 'form-control studyBR']) !!}
                    </div>

                    <!-- FINAL -->
                    <div class="form-group col-sm-8 fr">
                        {!! Form::label('total_transf', 'Total Transformação') !!}
                        {!! Form::text('total_transf', isset($proposal->finalBusinessStudy->total_transf) ? $proposal->finalBusinessStudy->total_transf : '', ['class' => 'form-control studyBR']) !!}
                    </div>

                    <!-- FINAL -->
                    <div class="form-group col-sm-8 fr">
                        {!! Form::label('total_benefits', 'Total Apoios') !!}
                        {!! Form::text('total_benefits', isset($proposal->finalBusinessStudy->total_benefits) ? $proposal->finalBusinessStudy->total_benefits : '', ['class' => 'form-control studyBR']) !!}
                    </div>

                    <!-- FINAL -->
                    <div class="form-group col-sm-8 fr">
                        {!! Form::label('extras_total2', 'Total Extras 2') !!}
                        {!! Form::text('extras_total2', isset($proposal->finalBusinessStudy->extras_total2) ? $proposal->finalBusinessStudy->extras_total2 : '', ['class' => 'form-control studyBR']) !!}
                    </div>

                    <!-- FINAL -->
                    <div class="form-group col-sm-8 fr">
                        {!! Form::label('sub_total', 'Sub Total') !!}
                        {!! Form::text('sub_total', isset($proposal->finalBusinessStudy->sub_total) ? $proposal->finalBusinessStudy->esub_totalxtras_total2 : '', ['class' => 'form-control studyBR']) !!}
                    </div>

                    <!-- FINAL -->
                    <div class="form-group col-sm-8 fr">
                        {!! Form::label('isv', 'ISV') !!}
                        {!! Form::text('isv', isset($proposal->finalBusinessStudy->isv) ? $proposal->finalBusinessStudy->isv : '', ['class' => 'form-control studyBR']) !!}
                    </div>

                    <!-- FINAL -->
                    <div class="form-group col-sm-8 fr">
                        {!! Form::label('iva', 'IVA') !!}
                        {!! Form::text('iva', isset($proposal->finalBusinessStudy->iva) ? $proposal->finalBusinessStudy->iva : '', ['class' => 'form-control studyBR']) !!}
                    </div>

                    <!-- FINAL -->
                    <div class="form-group col-sm-8 fr">
                        {!! Form::label('total', 'Total') !!}
                        {!! Form::text('total', isset($proposal->finalBusinessStudy->total) ? $proposal->finalBusinessStudy->total : '', ['class' => 'form-control studyBR']) !!}
                    </div>

                    <!-- FINAL -->
                    <div class="form-group col-sm-8 fr">
                        {!! Form::label('sale', 'Venda') !!}
                        {!! Form::text('sale', isset($proposal->finalBusinessStudy->sale) ? $proposal->finalBusinessStudy->sale : '', ['class' => 'form-control studyBR']) !!}
                    </div>

                    <!-- FINAL -->
                    <div class="form-group col-sm-8 fr">
                        {!! Form::label('purchase_price', 'Valor de compra') !!}
                        {!! Form::text('purchase_price', isset($proposal->finalBusinessStudy->purchase_price) ? $proposal->finalBusinessStudy->purchase_price : '', ['class' => 'form-control studyBR']) !!}
                    </div>

                    <!-- FINAL -->
                    <!-- MUDAR PARA VALORES DE VENDA -->
                    <div class="form-group col-sm-8 fr">
                        {!! Form::label('purchase_price', 'Valor de venda') !!}
                        {!! Form::text('purchase_price', isset($proposal->finalBusinessStudy->purchase_price) ? $proposal->finalBusinessStudy->purchase_price : '', ['class' => 'form-control studyBR']) !!}
                    </div>

                    <!-- FINAL -->
                    <div class="form-group col-sm-8 fr">
                        {!! Form::label('total_diff_amount', 'Diferença da retoma') !!}
                        {!! Form::text('total_diff_amount', isset($proposal->finalBusinessStudy->total_diff_amount) ? $proposal->finalBusinessStudy->total_diff_amount : '', ['class' => 'form-control studyBR']) !!}
                    </div>

                    <!-- FINAL -->
                    <div class="form-group col-sm-8 fr">
                        {!! Form::label('settle_amount', 'Preço a liquidar') !!}
                        {!! Form::text('settle_amount', isset($proposal->finalBusinessStudy->settle_amount) ? $proposal->finalBusinessStudy->settle_amount : '', ['class' => 'form-control studyBR']) !!}
                    </div>

                    {{-- <!-- Proposal Number Field -->
                    <!-- <div class="form-group col-sm-4">
                    {!! Form::label('pos_number', 'Nº da proposta') !!}
                    {!! Form::text('pos_number', isset($proposal->pos_number) ? $proposal->pos_number : '', ['class' => 'form-control', 'disabled']) !!}--> --}}
                </div>
            </div>
            <div class="card-footer"
                style="padding: 0.75rem 0.75rem 0.75rem 0; display: flex; justify-content: center">
                <div class="mr-2">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                </div>
                <div class="ml-2">
                    <a href="{{ route('proposals.index') }}" class="btn btn-default">{{ __('Cancel') }}</a>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>

@push('page_scripts')
    <script>
        $(".checked").click(function(e) {
            var id = $(this).val();
            if ($('#checkbox' + id).is(':checked')) {
                $('#doc' + id).removeAttr("disabled");
            } else {
                $('#doc' + id).attr("disabled", true);
            }
        });

        function removeFinancing(id) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'post',
                url: '/financing-remove', // This is the url we gave in the route
                dataType: 'json',
                data: {
                    id: id,
                },
                success: function(response) { // What to do if we succeed
                    alert('Tem a certeza?');
                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        }
    </script>
@endpush