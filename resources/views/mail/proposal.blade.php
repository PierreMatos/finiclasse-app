@component('mail::message')
<h1 style="text-align: center;">Proposal Order</h1>

<div style="background-color: #EDF2F7; padding: 10px;">
    <h2>Cliente:</h2>

    Nome: {{ $proposal->client->name }}

    E-mail: {{ $proposal->client->email }}
</div>

<br>

<div>
    <h2 style="text-align: center;">Viatura:</h2>
    <img src="{{ asset($proposal->car->getFirstMediaUrl('cars'))}}" style="display: block; margin: 0 auto;" />
</div>

<br>

<div>
    <p>Queremos felicitá-lo pela escolha da viatura de marca <strong>{{ $proposal->car->model->make->name }}</strong> com o modelo <strong>{{ $proposal->car->model->name }}</strong>.</p>
</div>

<div style="">

    @if (!empty($proposal->finalBusinessStudy->sub_total))
    
        Sub total {{$proposal->finalBusinessStudy->sub_total}}
        Extras Total: @money($proposal->finalBusinessStudy->extras_total)
        IVA: @money($proposal->finalBusinessStudy->iva)
        ISV: @money($proposal->finalBusinessStudy->isv)
    
    @elseif (!empty($proposal->initialBusinessStudy->sub_total))
    
        Sub total: @money($proposal->initialBusinessStudy->sub_total) 
        Extras Total: @money($proposal->initialBusinessStudy->extras_total)
        IVA: @money($proposal->initialBusinessStudy->iva)
        ISV: @money($proposal->initialBusinessStudy->isv)
    
    @endif
    
    @if($proposal->tradein)

        Valor da retoma a abater: @money($proposal->initialBusinessStudy->settle_amount)

    @endif
    
</div>
<br>

<div style="font-weight: bold;">
    Obrigado por nos escolher,

    {{ $proposal->vendor->name }}

    {{ $proposal->vendor->email }}

    {{ $proposal->vendor->mobile_phone }}
</div>

<br>

Cumprimentos,<br>
{{ $proposal->vendor->stand->name }}
@endcomponent