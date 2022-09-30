@component('mail::message')
<h1 style="text-align: center; font-size: 20px; font-weight: bold; text-decoration: underline;">Notificação de negócio rejeitado</h1>

<br>

@if (!empty($proposal->finalBusinessStudy->sub_total))

@component('mail::table')
  <table style="border-collapse: collapse;">
    <tr style="border-bottom: 1px solid #C2C2C2;">
        <th style="text-align: left; text-transform: uppercase; background-color: #C2C2C2; padding: 10px; border: none;">Proposta Nº {{ $proposal->id }} </th>
    </tr>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
        <td style="padding: 10px;">Valor de negócio:</td>
        <td style="padding: 10px;"><b>@money($proposal->finalBusinessStudy->total)</b></td>
    </tr>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
        <td style="padding: 10px;">Valor da retoma:</td>
        <td style="padding: 10px;"><b>@money($proposal->finalBusinessStudy->tradein_purchase)</b></td>
    </tr>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
        <td style="padding: 10px;">Apoio:</td>
        <td style="padding: 10px;"><b>@money($proposal->finalBusinessStudy->total_benefits)</b></td>
    </tr>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
        <td style="padding: 10px;"><b>Preço a pagar:</b></td>
        <td style="padding: 10px;"><b>@money($proposal->finalBusinessStudy->sale)</b></td>
    </tr>
    @if ($proposal->car->condition_id == 1)
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
        <td style="padding: 10px;"><b>Percentagem:</b></td>
        <td style="padding: 10px;"><b>($proposal->finalBusinessStudy->total_discount_perc) %</b></td>
    </tr>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
        <td style="padding: 10px;"><b>Desconto:</b></td>
        <td style="padding: 10px;"><b>@money($proposal->finalBusinessStudy->total_discount_amount)</b></td>
    </tr>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
        <td style="padding: 10px;"><b>Diferença:</b></td>
        <td style="padding: 10px;"><b>@money($proposal->finalBusinessStudy->total_diff_amount)</b></td>
    </tr>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
        <td style="padding: 10px;"><b>Preço a liquidar::</b></td>
        <td style="padding: 10px;"><b>@money($proposal->finalBusinessStudy->settle_amount)</b></td>
    </tr>
    @endif
    @if ($proposal->car->condition_id !== 1)
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
        <td style="padding: 10px;"><b>Margem:</b></td>
        <td style="padding: 10px;"><b>@money($proposal->finalBusinessStudy->margin)</b></td>
    </tr>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
        <td style="padding: 10px;"><b>Margem com IVA:</b></td>
        <td style="padding: 10px;"><b>@money($proposal->finalBusinessStudy->marginIVA)</b></td>
    </tr>
    @endif

</table>
@endcomponent

@elseif (!empty($proposal->initialBusinessStudy->sub_total))


@component('mail::table')
  <table style="border-collapse: collapse;">
    <tr style="border-bottom: 1px solid #C2C2C2;">
        <th style="text-align: left; text-transform: uppercase; background-color: #C2C2C2; padding: 10px; border: none;">Proposta Nº {{ $proposal->id }} </th>
    </tr>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
        <td style="padding: 10px;">Valor de negócio:</td>
        <td style="padding: 10px;"><b>@money($proposal->initialBusinessStudy->total)</b></td>
    </tr>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
        <td style="padding: 10px;">Valor da retoma:</td>
        <td style="padding: 10px;"><b>@money($proposal->initialBusinessStudy->tradein_purchase)</b></td>
    </tr>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
        <td style="padding: 10px;">Apoio:</td>
        <td style="padding: 10px;"><b>@money($proposal->initialBusinessStudy->total_benefits)</b></td>
    </tr>
    @if ($proposal->car->condition_id == 1)
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;"><b>Percentagem:</b></td>
            <td style="padding: 10px;"><b>($proposal->initialBusinessStudy->total_discount_perc) %</b></td>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;"><b>Desconto:</b></td>
            <td style="padding: 10px;"><b>@money($proposal->initialBusinessStudy->total_discount_amount)</b></td>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;"><b>Diferença:</b></td>
            <td style="padding: 10px;"><b>@money($proposal->initialBusinessStudy->total_diff_amount)</b></td>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;"><b>Preço a liquidar:</b></td>
            <td style="padding: 10px;"><b>@money($proposal->initialBusinessStudy->settle_amount)</b></td>
        </tr>
    @endif
    @if ($proposal->car->condition_id !== 1)
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;"><b>Margem:</b></td>
            <td style="padding: 10px;"><b>@money($proposal->initialBusinessStudy->margin)</b></td>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;"><b>Margem com IVA:</b></td>
            <td style="padding: 10px;"><b>@money($proposal->initialBusinessStudy->marginIVA)</b></td>
        </tr>
    @endif


  </table>
@endcomponent

@endif


@component('mail::button', ['url' => env('APP_URL') . 'proposals/' . $proposal->id . "/edit"])
VER PROPOSTA Nº {{ $proposal->id }}
@endcomponent
@endcomponent