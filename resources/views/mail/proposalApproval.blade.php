@component('mail::message')
<h1 style="text-align: center; font-size: 20px; font-weight: bold; text-decoration: underline;">Notificação negócio para validação</h1>

<br>
<p style="text-align: center;">O vendedor {{ $proposal->vendor->name }} tem a seguinte proposta para ser validada:</p>

@component('mail::table')
  <table style="border-collapse: collapse;">
    <tr style="border-bottom: 1px solid #C2C2C2;">
        <th style="text-align: left; text-transform: uppercase; background-color: #C2C2C2; padding: 10px; border: none;">Proposta Nº {{ $proposal->id }} </th>
    </tr>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
        <td style="padding: 10px;">Valor de negócio:</td>
        <td style="padding: 10px;"><b>52.899.99 €</b></td>
    </tr>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
        <td style="padding: 10px;">Valor da retoma:</td>
        <td style="padding: 10px;"><b>12.000.00 €</b></td>
    </tr>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
        <td style="padding: 10px;">Apoio:</td>
        <td style="padding: 10px;"><b>800.00 €</b></td>
    </tr>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
        <td style="padding: 10px;"><b>Valor a pagar:</b></td>
        <td style="padding: 10px;"><b>42.000.00 €</b></td>
    </tr>
  </table>
@endcomponent

@component('mail::button', ['url' => "http://127.0.0.1:8000/proposals/" . $proposal->id . "/edit"])
VER PROPOSTA Nº {{ $proposal->id }}
@endcomponent

{{-- @if (!empty($proposal->finalBusinessStudy->sub_total))

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

@endif --}}

@endcomponent