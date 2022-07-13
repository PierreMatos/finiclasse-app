@component('mail::message')
<h1 style="text-align: center; font-size: 20px; font-weight: bold; text-decoration: underline;">Proposta Comercial</h1>

<br>
<p style="text-align: center;">Obrigado pela sua preferência!</p>

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
        @if (!$proposal->car->getFirstMediaUrl('cars'))
            <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
                <td style="padding: 0px;"><img src="{{ asset('storage/images/finiclasse.png') }}" /></td>
            </tr>
        @else
            <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
                <td style="padding: 0px;"> <img src="{{ asset($proposal->car->getFirstMediaUrl('cars'))}}" /> </td>
            </tr>
        @endif
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;">Condição: <b>{{$proposal->car->condition->name}}</b></td>
            <td style="padding: 10px;">Tipo: <b>{{$proposal->car->state->name}}</b></td>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;">Marca: <b>{{$proposal->car->model->make->name}}</b></td>
            <td style="padding: 10px;">Modelo: <b>{{$proposal->car->model->name}}</b></td>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            @if ($proposal->car->state->id === 5)
            <td style="padding: 10px;">Komm: <b>{{$proposal->car->komm}}</b></td>
            @else
            <td style="padding: 10px;">Motorização: <b>{{$proposal->car->motorization}}</b></td>
            @endif
            <td style="padding: 10px;">Variante: <b>{{$proposal->car->variant}}</b></td>
        </tr>
        @if ($proposal->car->state->id !== 5)
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;">Km: <b>{{$proposal->car->km}}</b></td>
            <td style="padding: 10px;">Ano: <b>{{$proposal->car->registration->format('Y/m/d')}}</b></td>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;">Combustível: <b>{{$proposal->car->fuel->name}}</b></td>
            <td style="padding: 10px;">Caixa: <b>{{$proposal->car->transmission->name}}</b></td>
        </tr>
        @endif
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
            @if ($proposal->car->condition_id !== 1)
            <td style="padding: 10px;">Preço a liquidar: <b>{{$proposal->initialBusinessStudy->settle_amount}} €</b></td>
            @else
            <td style="padding: 10px;">Preço Base: <b>{{$proposal->car->price_base}} €</b></td>
            @endif
        </tr>
    </table>
@endcomponent

@component('mail::table')
    @if(isset($proposal->tradein_id))
        <table style="border-collapse: collapse;">
            <tr style="border-bottom: 1px solid #C2C2C2;">
                <th style="text-align: left; text-transform: uppercase; background-color: #C2C2C2; padding: 10px; border: none;">Retoma</th>
            </tr>
            @if (!$proposal->tradein->getFirstMediaUrl('cars'))
                <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
                    <td style="padding: 0px;"><img src="storage/images/finiclasse.png" /></td>
                </tr>
            @else
            <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
                <td style="padding: 0px;"><img src="{{ asset($proposal->tradein->getFirstMediaUrl('cars'))}}" /></td>
            </tr>
            @endif
            <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
                <td style="padding: 10px;">Marca: <b>{{$proposal->tradein->model->make->name}}</b></td>
                <td style="padding: 10px;">Modelo: <b>{{$proposal->tradein->model->name}}</b></td>
            </tr>
            <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
                <td style="padding: 10px;">Km: <b>{{$proposal->tradein->km}}</b></td>
                <td style="padding: 10px;">Ano/mês: <b>{{$proposal->tradein->registration->isoFormat('M/Y')}}</b></td>
            </tr>
            <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
                <td style="padding: 10px;">Valor: <b>{{$proposal->tradein->tradein_purchase}} €</b></td>
            </tr>
        </table>
    @endif
@endcomponent

@component('mail::table')
@if ($proposal->campaigns->isNotEmpty())
    <table style="border-collapse: collapse;">
            <tr style="border-bottom: 1px solid #C2C2C2;">
                <th style="text-align: left; text-transform: uppercase; background-color: #C2C2C2; padding: 10px; border: none;">Campanha</th>
            </tr>
                @foreach ($proposal->campaigns as $campaign)
                    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
                        <td style="padding: 10px;">Tipo: <b>{{$campaign->pivot->name}}</b></td>
                        <td style="padding: 10px;"><b>{{$campaign->pivot->value}} {{$campaign->pivot->type}}</b></td>
                    </tr>
                @endforeach
    </table>
@endif
@endcomponent

@component('mail::table')
@if ($proposal->benefits->isNotEmpty())
    <table style="border-collapse: collapse;">
            <tr style="border-bottom: 1px solid #C2C2C2;">
                <th style="text-align: left; text-transform: uppercase; background-color: #C2C2C2; padding: 10px; border: none;">Apoio</th>
            </tr>
                @foreach ($proposal->benefits as $benefit)
                    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
                        <td style="padding: 10px;">Tipo: <b>{{$benefit->pivot->name}}</b></td>
                        <td style="padding: 10px;"><b>{{$benefit->pivot->value}} {{$benefit->pivot->type}}</b></td>
                    </tr>
                @endforeach
    </table>
@endif
@endcomponent

@component('mail::table')
@if ($proposal->financings->isNotEmpty())
    <table style="border-collapse: collapse;">
        <tr style="border-bottom: 1px solid #C2C2C2;">
            <th style="text-align: left; text-transform: uppercase; background-color: #C2C2C2; padding: 10px; border: none;">Financiamento</th>
        </tr>
            @foreach ($proposal->financings as $financing)
                <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
                    <td style="padding: 10px;">Tipo: <b>{{$financing->name}}</b></td>
                </tr>
            @endforeach
    </table>
@endif
@endcomponent

@component('mail::table')
    <table style="border-collapse: collapse;">
        <tr style="border-bottom: 1px solid #C2C2C2;">
            <th style="text-align: left; text-transform: uppercase; background-color: #C2C2C2; padding: 10px; border: none;">Proposta Nº {{$proposal->id}}</th>
        </tr>
        @if ($proposal->tradein_id)
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;">Valor da retoma:</td>
            <td style="padding: 10px;"><b>{{$proposal->tradein->tradein_purchase ?? 0}} €</b></td>
        </tr>
        @endif
        @if ($proposal->benefits->isNotEmpty())
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;">Apoio:</td>
            <td style="padding: 10px;"><b>{{$proposal->finalBusinessStudy->total_benefits ?? $proposal->initialBusinessStudy->total_benefits}} €</b></td>
        </tr>
        @endif
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;"><b>Preço a pagar:</b></td>
            <td style="padding: 10px;"><b>{{$proposal->finalBusinessStudy->sale ?? $proposal->initialBusinessStudy->sale}} €</b></td>
        </tr>
    </table>
@endcomponent
@if ($proposal->comment)
<div style="font-weight: bold; text-align: center;">Nota do vendedor</div>
<br>
<div style="padding-bottom: 10px;">
    <p style="text-align: center;"> {{ $proposal->comment }}</p>
</div>
<hr style="text-align: center; width: 50%;">
@endif

<br>
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