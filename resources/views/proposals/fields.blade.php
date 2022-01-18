<!-- Tab panes -->
<div class="tab-content mt-2 container">

    <div class="tab-pane active" id="clients" role="tabpanel" aria-labelledby="client-tab">
        <div class="row">

            <!-- Client Name Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_name', 'Nome do cliente') !!}
                {!! Form::text('client_name', isset($proposal->client->name) ? $proposal->client->name : '', ['class' =>
                'form-control', 'disabled']) !!}
            </div>

            <!-- Client Email Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_email', 'E-mail') !!}
                {!! Form::text('client_email', isset($proposal->client->email) ? $proposal->client->email : '', ['class'
                => 'form-control', 'disabled']) !!}
            </div>

            <!-- Client Type Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_type', 'Tipo') !!}
                {!! Form::text('client_type', isset($proposal->client->type) ? $proposal->client->type : '', ['class' =>
                'form-control', 'disabled']) !!}
            </div>

            <!-- Client City Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_city', 'Cidade') !!}
                {!! Form::text('client_city', isset($proposal->client->city) ? $proposal->client->city : '', ['class' =>
                'form-control', 'disabled']) !!}
            </div>

            <!-- Client Adress Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_adress', 'Morada') !!}
                {!! Form::text('client_adress', isset($proposal->client->adress) ? $proposal->client->adress : '',
                ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Client Zip Code Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_zip_code', 'Código Postal') !!}
                {!! Form::text('client_zip_code', isset($proposal->client->zip_code) ? $proposal->client->zip_code : '',
                ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Client  Phone -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_phone', 'Telefone') !!}
                {!! Form::text('client_phone', isset($proposal->client->phone) ? $proposal->client->mobile_phone : '',
                ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Client Mobile Phone -->
            <div class="form-group col-sm-4">
                {!! Form::label('client_mobile_phone', 'Telemóvel') !!}
                {!! Form::text('client_mobile_phone', isset($proposal->client->mobile_phone) ?
                $proposal->client->mobile_mobile_phone : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- NIF Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('nif', 'NIF:') !!}
                {!! Form::text('nif', isset($proposal->client->nif) ? $proposal->client->nif : '', ['class' =>
                'form-control', 'disabled']) !!}
            </div>

            <!-- First Contact Date Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('first_contact_date', 'Primeiro contato') !!}
                {!! Form::text('first_contact_date', isset($proposal->first_contact_date) ?
                $proposal->first_contact_date : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Last Contact Date Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('last_contact_date', 'Último contato') !!}
                {!! Form::text('last_contact_date', isset($proposal->last_contact_date) ? $proposal->last_contact_date :
                '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Next Contact Date Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('next_contact_date', 'Próximo contato') !!}
                {!! Form::text('next_contact_date', isset($proposal->next_contact_date) ? $proposal->next_contact_date :
                '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Comment Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('comment', 'Comentário') !!}
                {!! Form::textarea('comment', isset($proposal->comment) ? $proposal->comment : '', ['class' =>
                'form-control', 'disabled']) !!}
            </div>

            <!-- Gdpr Confirmation Color Field -->
            <div class="form-group col-md-4">
                <div style="margin-top: 37px;">
                    <input type="hidden" name="gdpr_confirmation" value="0" disabled>
                    <input type="checkbox" name="gdpr_confirmation" value="1" {{
                        isset($proposal->client->gdpr_confirmation) == '1' ? ' checked' : '' }} disabled>
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
                {!! Form::label('make_id', isset($proposal->car->model->make->name) ? $proposal->car->model->make->name
                : '') !!}
                @if (!$proposal->car->getFirstMediaUrl('cars', 'thumb'))
                    <img src="/storage/images/noPhoto.jpg" style="max-width: 250px;" class="imgCar" />
                @else
                    <img src="{{ $proposal->car->getFirstMediaUrl('cars', 'thumb') }}" style="max-width: 250px;" class="imgCar" />
                @endif
                <!-- <img src="{{ $proposal->car->getFirstMediaUrl('cars', 'thumb') }}" style="max-width: 250px;" /> -->
                @endif
            </div>

           

            <div class="form-group col-sm-8" style="display: flex;">
                <!-- Fuel Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('fuel_id', 'Combustível') !!}
                    {!! Form::text('fuel_id', isset($proposal->car->fuel->name) ? $proposal->car->fuel->name : '',
                    ['class' => 'form-control', 'disabled']) !!}

                    <!-- State Id Field -->
                    <div class="form-group"></div>
                    {!! Form::label('state_id', 'Estado') !!}
                    {!! Form::text('state_id', isset($proposal->car->state) ? $proposal->car->state->name : '', ['class'
                    => 'form-control', 'disabled']) !!}
                </div>

                <!-- Color Exterior Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('color_exterior', 'Cor exterior') !!}
                    {!! Form::text('color_exterior', isset($proposal->car->color_exterior) ?
                    $proposal->car->color_exterior : '', ['class' => 'form-control', 'disabled']) !!}

                    <!-- Ano Id Field -->
                    <div class="form-group"></div>
                    {!! Form::label('registration', 'Ano') !!}
                    {!! Form::text('registration', isset($proposal->car->registration) ? $proposal->car->registration :
                    '', ['class' => 'form-control', 'disabled']) !!}
                </div>

                       <!-- Test Drive Field -->
                <div class="form-group col-sm-4">
                    <div style="margin-top: 37px;">
                        {!! Form::label('test_drive', 'Teste drive') !!}
                        <!-- <label>Teste drive</label> -->
                        <input type="hidden" name="test_drive" value="0" disabled>
                        <input type="checkbox" name="test_drive" value="1" {{ isset($proposal->test_drive) == '1' ? ' checked' : '' }} disabled>
                    </div>
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
                @if (!empty($proposal->tradein_id))
                {!! Form::label('make_id', isset($proposal->tradein->model->make->name) ?
                $proposal->tradein->model->make->name : '') !!}
                @if (!$proposal->tradein->getFirstMediaUrl('cars', 'thumb'))
                <img src="/storage/images/noPhoto.jpg" style="max-width: 250px;" class="imgCar" />
                @else
                    <img src="{{ $proposal->tradein->getFirstMediaUrl('cars', 'thumb') }}" style="max-width: 250px;" class="imgCar" />
                @endif
                <!-- <img src="{{ $proposal->tradein->getFirstMediaUrl('cars', 'thumb') }}" style="max-width: 250px;" /> -->
                @endif
            </div>

            <div class="form-group col-sm-8" style="display: flex;">
                <!-- Fuel Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('fuel_id', 'Combustível') !!}
                    {!! Form::text('fuel_id', isset($proposal->tradein->fuel->name) ? $proposal->tradein->fuel->name :
                    '', ['class' => 'form-control', 'disabled']) !!}

                    <!-- State Id Field -->
                    <div class="form-group"></div>
                    {!! Form::label('state_id', 'Estado') !!}
                    {!! Form::text('state_id', isset($proposal->tradein->state->name) ? $proposal->tradein->state->name
                    : '', ['class' => 'form-control', 'disabled']) !!}
                </div>

                <!-- Color Exterior Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('color_exterior', 'Cor exterior') !!}
                    {!! Form::text('color_exterior', isset($proposal->tradein->color_exterior) ?
                    $proposal->tradein->color_exterior : '', ['class' => 'form-control', 'disabled']) !!}

                    <!-- Ano Id Field -->
                    <div class="form-group"></div>
                    {!! Form::label('registration', 'Ano') !!}
                    {!! Form::text('registration', isset($proposal->tradein->registration) ?
                    $proposal->tradein->registration : '', ['class' => 'form-control', 'disabled']) !!}
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
                        {!! Form::text('tradein_purchase', isset( $proposal->tradein->tradein_purchase) ?
                        $proposal->tradein->tradein_purchase : '', ['class' => 'form-control',
                        'id'=>'tradein_purchase']) !!}
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

            <button type="button" id="{{isset($proposal->tradein->id) ? $proposal->tradein->id : '' }}" value="8"
                class="trade btn btn-info"> Aceitar</button>
            <button type="button" id="{{isset($proposal->tradein->id) ? $proposal->tradein->id : ''}}" value="7"
                class="trade btn btn-info"> Rejeitar</button>

            @if ($proposal->tradein_id != '')
            <a href="{{ route('cars.show', [$proposal->tradein->id]) }}">Ver tudo</a>
            @endif
        </div>
    </div>

    <div class="tab-pane" id="financings" role="tabpanel" aria-labelledby="financings-tab">
        {!! Form::model($financings, ['route' => 'financingProposals.store', 'method' => 'post', 'files' => true, 'enctype'=>'multipart/form-data']) !!}

        <div class="row">

            <input type="hidden" name="proposal_id" value="{{$proposal->id}}" />


            @foreach ( $financings as $financing )

            <input type="hidden" name="financing_id[]" value="{{$financing->id}}" />

            <!-- {{ Form::hidden('financing_id', $financing->id, array('id' => $financing->id)) }} -->

            <!-- Financing -->
            <div class="form-group col-sm-1">
                
                @if ($proposal->financings->contains('id', $financing->id))
                <input checked="checked" class="mt-5" name="checked[{{$financing->id}}]" type="checkbox" value="{{$financing->id}}">
                @else
                <input name="checked[{{$financing->id}}]" class="mt-5" type="checkbox" value="{{$financing->id}}">
                @endif

            </div>


            <!-- Financial Type Field -->
            <div class="form-group col-sm-7">
                {!! Form::label('name', 'Tipo de financiamento') !!}
                {!! Form::text('name', isset($financing->name) ? $financing->name : '', ['class' => 'form-control',
                'disabled']) !!}
            </div>

            <!-- Financial Description Field -->
            <!-- <div class="form-group col-sm-4">
                {!! Form::label('description', 'Descrição') !!}
                {!! Form::text('description', isset($financing->description) ? $financing->description : '', ['class' => 'form-control', 'disabled']) !!}
            </div> -->


            <!-- Contract Field -->

            <div class="form-group col-sm-4">
                {!! Form::label('contract', 'Contrato') !!}

                @foreach ($financingsproposal as $financingproposal )

                <!-- <input type="text" name="proposal_id" value="{{$proposal->id}}" /> -->
{{$financingproposal->financing_id}}
                        @if ($financingproposal->financing_id == $financing->id)
a
                        @if (!($financingproposal->getFirstMediaUrl('financingproposal')))
                        b
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" id="{{$financingproposal->financing_id}}" name="checked[{{$financing->id}}]" multiple class="custom-file-input"/>
                                <label for="checked[{{$financing->id}}]" class="custom-file-label">Adicione o documento</label>
                            </div>
                           
                        </div>
                        @else
                            <a href="{{ $financingproposal->getFirstMediaUrl('financingproposal') }}" target="_blank" class="btn btn-default">{{ __('Open') }}</a>

                        @endif

                        @endif

                @endforeach

                <!-- @if (isset($proposalFinancing)) -->
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" id="document[]" name="document[]" multiple class="custom-file-input"/>
                        <label for="document[]" class="custom-file-label">Adicione o documento</label>
                    </div>
                    <!-- <div class="custom-file">
                        {!! Form::file('document', ['class' => 'custom-file-input']) !!}
                        {!! Form::label('document', 'Choose file', ['class' => 'custom-file-label']) !!}
                    </div> -->
                </div>

                <!-- @endif -->
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
        <div class="row mb-5">

            <!-- Proposal Value Field -->
            <div class="form-group col-sm-4">
                <p>Diferença</p>
                <h2>@money($proposal->initialBusinessStudy->total_diff_amount)</h2>
            </div>

            <!-- Financial Value Field -->
            <div class="form-group col-sm-4">
                <p>Desconto</p>
                <h2>@money($proposal->initialBusinessStudy->total_discount_amount)</h2>
            </div>

            <!-- Tradein Value Field -->
            <div class="form-group col-sm-4">
                <p>%</p>
                <h2>@money($proposal->initialBusinessStudy->total_discount_perc)</h2>
            </div>

        </div>

        {!! Form::model($proposal, ['route' => ['businessStudies.update', $proposal->finalBusinessStudy->id], 'method' => 'patch', 'files' => true]) !!}

        <div class="row">

            <div class="col-12 mb-5">
                <h1>Estudo de negócio</h1>
            </div>
            <!-- TODO ESTUDO DE NEGOCIO -->


            <!-- INICIAL -->
            <div class="form-group col-sm-6">
                <!-- <p>Valor do negócio</p> -->
                <h2>Inicial</h2>
            </div>

            <!-- FINAL -->
            <div class="form-group col-sm-6">
                <!-- <p>Valor do financiamento</p> -->
                <h2>Final</h2>
            </div>

            <!-- INICIAL -->
            <div class="form-group col-sm-6">
                <h5>Preço base</h5>
                <p>@money($proposal->initialBusinessStudy->base_price)</p>
            </div>

            <!-- FINAL -->
            <div class="form-group col-sm-4">
                {!! Form::label('base_price', 'Preço base') !!}
                {!! Form::text('base_price', isset($proposal->finalBusinessStudy->base_price) ? ($proposal->finalBusinessStudy->base_price) : '',
                ['class' => 'form-control']) !!}
            </div>

            <!-- INICIAL -->
            <div class="form-group col-sm-6">
                <h5>Total Extras</h5>
                <p>@money($proposal->initialBusinessStudy->extras_total)</p>
            </div>

            <!-- FINAL -->
            <div class="form-group col-sm-6">
                {!! Form::label('extras_total', 'Total Extras') !!}
                {!! Form::text('extras_total', isset($proposal->finalBusinessStudy->extras_total) ? ($proposal->finalBusinessStudy->extras_total) : '',
                ['class' => 'form-control']) !!}
            </div>

            <!-- INICIAL -->
            <div class="form-group col-sm-6">
                <h5>PTL</h5>
                <p>@money($proposal->initialBusinessStudy->ptl)</p>
            </div>

            <!-- FINAL -->
            <div class="form-group col-sm-6">
                {!! Form::label('ptl', 'PTL') !!}
                {!! Form::text('ptl', isset($proposal->finalBusinessStudy->ptl) ? ($proposal->finalBusinessStudy->ptl) : '',
                ['class' => 'form-control']) !!}
            </div>

            <!-- INICIAL -->
            <div class="form-group col-sm-6">
                <h5>SIGPU</h5>
                <p>@money($proposal->initialBusinessStudy->sigpu)</p>
            </div>

            <!-- FINAL -->
            <div class="form-group col-sm-6">
                {!! Form::label('sigpu', 'SIGPU') !!}
                {!! Form::text('sigpu', isset($proposal->finalBusinessStudy->sigpu) ? ($proposal->finalBusinessStudy->sigpu) : '',
                ['class' => 'form-control']) !!}
            </div>

            <!-- INICIAL -->
            <div class="form-group col-sm-6">
                <h5>Total Transformação</h5>
                <p>@money($proposal->initialBusinessStudy->total_transf)</p>
            </div>

            <!-- FINAL -->
            <div class="form-group col-sm-6">
                {!! Form::label('total_transf', 'Total Transformação') !!}
                {!! Form::text('total_transf', isset($proposal->finalBusinessStudy->total_transf) ? ($proposal->finalBusinessStudy->total_transf) : '',
                ['class' => 'form-control']) !!}
            </div>

            <!-- INICIAL -->
            <div class="form-group col-sm-6">
                <h5>Total Apoios</h5>
                <p>@money($proposal->initialBusinessStudy->total_benefits)</p>
            </div>

            <!-- FINAL -->
            <div class="form-group col-sm-6">
                {!! Form::label('total_benefits', 'Total Apoios') !!}
                {!! Form::text('total_benefits', isset($proposal->finalBusinessStudy->total_benefits) ? ($proposal->finalBusinessStudy->total_benefits) : '',
                ['class' => 'form-control']) !!}
            </div>

            <!-- INICIAL -->
            <div class="form-group col-sm-6">
                <h5>Total Extras</h5>
                <p>@money($proposal->initialBusinessStudy->extras_total2)</p>
            </div>

            <!-- FINAL -->
            <div class="form-group col-sm-6">
                {!! Form::label('extras_total2', 'Total Extras') !!}
                {!! Form::text('extras_total2', isset($proposal->finalBusinessStudy->extras_total2) ? ($proposal->finalBusinessStudy->extras_total2) : '',
                ['class' => 'form-control']) !!}
            </div>

            <!-- INICIAL -->
            <div class="form-group col-sm-6">
                <h5>Sub Total</h5>
                <p>@money($proposal->initialBusinessStudy->sub_total)</p>
            </div>

            <!-- FINAL -->
            <div class="form-group col-sm-6">
                {!! Form::label('sub_total', 'Sub Total') !!}
                {!! Form::text('sub_total', isset($proposal->finalBusinessStudy->sub_total) ? ($proposal->finalBusinessStudy->esub_totalxtras_total2) : '',
                ['class' => 'form-control']) !!}
            </div>

            <!-- INICIAL -->
            <div class="form-group col-sm-6">
                <h5>ISV</h5>
                <p>@money($proposal->initialBusinessStudy->isv)</p>
            </div>

            <!-- FINAL -->
            <div class="form-group col-sm-6">
                {!! Form::label('isv', 'ISV') !!}
                {!! Form::text('isv', isset($proposal->finalBusinessStudy->isv) ? ($proposal->finalBusinessStudy->isv) : '',
                ['class' => 'form-control']) !!}
            </div>

            <!-- INICIAL -->
            <div class="form-group col-sm-6">
                <h5>IVA</h5>
                <p>@money($proposal->initialBusinessStudy->iva)</p>
            </div>

            <!-- FINAL -->
            <div class="form-group col-sm-6">
                {!! Form::label('iva', 'IVA') !!}
                {!! Form::text('iva', isset($proposal->finalBusinessStudy->iva) ? ($proposal->finalBusinessStudy->iva) : '',
                ['class' => 'form-control']) !!}
            </div>

            <!-- INICIAL -->
            <div class="form-group col-sm-6">
                <h5>Total</h5>
                <p>@money($proposal->initialBusinessStudy->total)</p>
            </div>

            <!-- FINAL -->
            <div class="form-group col-sm-6">
                {!! Form::label('total', 'Total') !!}
                {!! Form::text('total', isset($proposal->finalBusinessStudy->total) ? ($proposal->finalBusinessStudy->total) : '',
                ['class' => 'form-control']) !!}
            </div>

            <!-- INICIAL -->
            <div class="form-group col-sm-6">
                <h5>Venda</h5>
                <p>@money($proposal->initialBusinessStudy->sell)</p>
            </div>

            <!-- FINAL -->
            <div class="form-group col-sm-6">
                {!! Form::label('sale', 'Venda') !!}
                {!! Form::text('sale', isset($proposal->finalBusinessStudy->sale) ? ($proposal->finalBusinessStudy->sale) : '',
                ['class' => 'form-control']) !!}
            </div>

            <!-- INICIAL -->
            <div class="form-group col-sm-6">
                <h5>Valor de compra</h5>
                <p>@money($proposal->initialBusinessStudy->purchase_price)</p>
            </div>

            <!-- FINAL -->
            <div class="form-group col-sm-6">
                {!! Form::label('purchase_price', 'Valor de compra') !!}
                {!! Form::text('purchase_price', isset($proposal->finalBusinessStudy->purchase_price) ? ($proposal->finalBusinessStudy->purchase_price) : '',
                ['class' => 'form-control']) !!}
            </div>

            <!-- INICIAL -->
            <div class="form-group col-sm-6">
                <h5>Valor de venda</h5>
                <p>@money($proposal->initialBusinessStudy->selling_price)</p>
            </div>

            <!-- FINAL -->
            <div class="form-group col-sm-6">
                {!! Form::label('purchase_price', 'Valor de compra') !!}
                {!! Form::text('purchase_price', isset($proposal->finalBusinessStudy->purchase_price) ? ($proposal->finalBusinessStudy->purchase_price) : '',
                ['class' => 'form-control']) !!}
            </div>

            <!-- INICIAL -->
            <div class="form-group col-sm-6">
                <h5>Diferença de retoma</h5>
                <p>@money($proposal->initialBusinessStudy->total_diff_amount)</p>
            </div>

            <!-- FINAL -->
            <div class="form-group col-sm-6">
                {!! Form::label('total_diff_amount', 'Diferença da retoma') !!}
                {!! Form::text('total_diff_amount', isset($proposal->finalBusinessStudy->total_diff_amount) ? ($proposal->finalBusinessStudy->total_diff_amount) : '',
                ['class' => 'form-control']) !!}
            </div>

            <!-- INICIAL -->
            <div class="form-group col-sm-6">
                <h5>Valor a liquidar</h5>
                <p>@money($proposal->initialBusinessStudy->settle_amount)</p>
            </div>

            <!-- FINAL -->
            <div class="form-group col-sm-6">
                {!! Form::label('settle_amount', 'Valor a liquidar') !!}
                {!! Form::text('settle_amount', isset($proposal->finalBusinessStudy->settle_amount) ? ($proposal->finalBusinessStudy->settle_amount) : '',
                ['class' => 'form-control']) !!}
            </div>

        




            <!-- Proposal Number Field -->
            <!-- <div class="form-group col-sm-4">
                {!! Form::label('pos_number', 'Nº da proposta') !!}
                {!! Form::text('pos_number', isset($proposal->pos_number) ? $proposal->pos_number : '', ['class' =>
                'form-control', 'disabled']) !!}
            </div> -->

   





        </div>
        <div class="card-footer">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('proposals.index') }}" class="btn btn-default">{{ __('Cancel') }}</a>
        </div>

        
         {!! Form::close() !!}
    </div>
</div>