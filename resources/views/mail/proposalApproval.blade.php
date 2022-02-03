@component('mail::message')
<h1 style="text-align: center;">Pedido de aprovação</h1>


<div>

@if (!empty($proposal->finalBusinessStudy->sub_total))
    
        <!-- Sub total {{$proposal->finalBusinessStudy->sub_total}}
        Extras Total: @money($proposal->finalBusinessStudy->extras_total)
        IVA: @money($proposal->finalBusinessStudy->iva)
        ISV: @money($proposal->finalBusinessStudy->isv) -->

        @if ($proposal->car->condition_id == 1)

            %: @money($proposal->finalBusinessStudy->total_discount_perc)
            Desconto: @money($proposal->finalBusinessStudy->total_discount_amount)
            Diferença: @money($proposal->finalBusinessStudy->total_diff_amount)
            Valor a liquidar: @money($proposal->finalBusinessStudy->settle_amount)

        @endif

        @if ($proposal->car->condition_id !== 1)

            Margem: @money($proposal->finalBusinessStudy->margin)
            Margem com IVA: @money($proposal->finalBusinessStudy->marginIVA)

        @endif

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

<br>

<div style="font-weight: bold;">

    {{ $proposal->vendor->name }}

    {{ $proposal->vendor->email }}

    {{ $proposal->vendor->mobile_phone }}
</div>

<br>

Cumprimentos,<br>
{{ $proposal->vendor->stand->name }}
@endcomponent