@component('mail::message')
<h1 style="text-align: center; font-size: 20px; font-weight: bold; text-decoration: underline;">Proposta Comercial</h1>

<br><br>
<div>
    <p style="line-height: 0em;">Obrigado pela sua preferência!</p>
</div>

@component('mail::table')
  <table style="border-collapse: collapse;">
    <tr style="border-bottom: 1px solid #C2C2C2;">
      <th style="text-align: left; text-transform: uppercase; background-color: #C2C2C2; padding: 10px; border: none;">Dados Cliente</th>
    </tr>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
      <td style="padding: 10px;">Nome: <b>{{ $proposal->client->name }}</b></td>
    </tr>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
        <td style="padding: 10px;">E-mail: <b>{{ $proposal->client->email }}</b></td>
    </tr>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
        <td style="padding: 10px;">Telefone: <b>{{ $proposal->client->mobile_phone }}</b></td>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
        <td style="padding: 10px;">NIF: <b>{{ $proposal->client->nif }}</b></td>
    </tr>
  </table>
@endcomponent

@component('mail::table')
    <table style="border-collapse: collapse;">
        <tr style="border-bottom: 1px solid #C2C2C2;">
            <th style="text-align: left; text-transform: uppercase; background-color: #C2C2C2; padding: 10px; border: none;">Viatura</th>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
            <td style="padding: 0px;"> <img src="{{ asset($proposal->car->getFirstMediaUrl('cars'))}}" /> </td>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
            <td style="padding: 10px;">Tipo: <b>{{$proposal->car->state->name}}</b></td>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;">Marca: <b>{{$proposal->car->model->make->name}}</b></td>
            <td style="padding: 10px;">Modelo: <b>{{$proposal->car->model->name}} {{$proposal->car->variant}}</b></td>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
            <td style="padding: 10px;">Preço Base: <b>{{$proposal->car->price_base ?? $proposal->car->price_base}} €</b></td>
            <!-- <td style="padding: 10px;">Valor: <b>$proposal->finalBusinessStudy->sale ?? $proposal->initialBusinessStudy->sale €</b></td> -->
        </tr>
    </table>
@endcomponent

@if(isset($proposal->tradein_id))
    @component('mail::table')
        <table style="border-collapse: collapse;">
            <tr style="border-bottom: 1px solid #C2C2C2;">
                <th style="text-align: left; text-transform: uppercase; background-color: #C2C2C2; padding: 10px; border: none;">Retoma</th>
            </tr>
            <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
                <td style="padding: 0px;"><img src="{{ asset($proposal->car->getFirstMediaUrl('cars'))}}" /></td>
            </tr>
            <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
                <td style="padding: 10px;">Marca: <b>{{$proposal->tradein->model->make->name}}</b></td>
                <td style="padding: 10px;">Modelo: <b>{{$proposal->tradein->model->name}}</b></td>
            </tr>
            <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
                <td style="padding: 10px;">Km: <b>{{$proposal->tradein->km}}</b></td>
                <td style="padding: 10px;">Ano/mês: <b>{{$proposal->tradein->registration->isoFormat('M/Y')}}</b></td>
            </tr>
            <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
                <td style="padding: 10px;">Valor: <b>{{$proposal->tradein->tradein_purchase}}</b></td>
            </tr>
        </table>
    @endcomponent
@endif

@if ($proposal->benefits->isNotEmpty())
<table style="border-collapse: collapse;">
    @component('mail::table')
        <tr style="border-bottom: 1px solid #C2C2C2;">
            <th style="text-align: left; text-transform: uppercase; background-color: #C2C2C2; padding: 10px; border: none;">Apoio</th>
        </tr>
            @foreach ( $proposal->benefits as $benefit)
                    <td style="padding: 10px;">Tipo: <b>{{$benefit->name}}</b></td>
                    <td style="padding: 10px;"><b>{{$benefit->pivot->value}} {{$benefit->pivot->type}}</b></td>
                    @endforeach
                    @endcomponent
                </table>
@endif

@if ($proposal->financings->isNotEmpty())
<table style="border-collapse: collapse;">
    @component('mail::table')
            <tr style="border-bottom: 1px solid #C2C2C2;">
                <th style="text-align: left; text-transform: uppercase; background-color: #C2C2C2; padding: 10px; border: none;">Financiamento</th>
            </tr>
            @foreach ( $proposal->financings as $financing)
                <td style="padding: 10px;">Tipo: <b>{{$financing->name}}</b></td>
            @endforeach
            @endcomponent
        </table>
@endif

@component('mail::table')
    <table style="border-collapse: collapse;">
        <tr style="border-bottom: 1px solid #C2C2C2;">
            <th style="text-align: left; text-transform: uppercase; background-color: #C2C2C2; padding: 10px; border: none;">Proposta Nº {{$proposal->id}}</th>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;">Valor de negócio:</td>
            <td style="padding: 10px;"><b>{{$proposal->finalBusinessStudy->total ?? $proposal->initialBusinessStudy->total}} €</b></td>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;">Valor da retoma:</td>
            <td style="padding: 10px;"><b>{{$proposal->tradein->tradein_purchase ?? 0}} €</b></td>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;">Apoio:</td>
            <td style="padding: 10px;"><b>{{$proposal->finalBusinessStudy->total_benefits ?? $proposal->initialBusinessStudy->total_benefits}} €</b></td>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;"><b>Valor a pagar:</b></td>
            <td style="padding: 10px;"><b>{{$proposal->finalBusinessStudy->sale ?? $proposal->initialBusinessStudy->sale}} €</b></td>
        </tr>
    </table>
@endcomponent

<div>
    <p style="text-align: center;">Caso tenha alguma dúvida não hesite em contactar-nos!</p>
</div>

<br>

<div style="font-weight: bold; text-align: center;">
    {{ $proposal->vendor->name }},

    {{ $proposal->vendor->email }}
    {{ $proposal->vendor->mobile_phone }}
</div>

<h2 style="text-align: center;">FINICLASSE</h2>
@endcomponent