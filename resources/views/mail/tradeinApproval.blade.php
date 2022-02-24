@component('mail::message')
<h1 style="text-align: center; font-size: 20px; font-weight: bold; text-decoration: underline;">Notificação retoma para validação</h1>

<br>
<p style="text-align: center;">O vendedor {{ $proposal->vendor->name }} tem a seguinte retoma para ser validada:</p>

@component('mail::table')
    <table style="border-collapse: collapse;">
        <tr style="border-bottom: 1px solid #C2C2C2;">
            <th style="text-align: left; text-transform: uppercase; background-color: #C2C2C2; padding: 10px; border: none;">Retoma</th>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
            <td style="padding: 0px;"><img src="{{ asset($proposal->car->getFirstMediaUrl('cars'))}}" /></td>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;">Marca: <b>{{ $proposal->tradein->model->make->name }}</b></td>
            <td style="padding: 10px;">Modelo: <b>{{ $proposal->tradein->model->name }}</b></td>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;">Km: <b>{{ $proposal->tradein->km }}</b></td>
            <td style="padding: 10px;">Ano/mês: <b>{{ $proposal->tradein->registration->isoFormat('M/Y') }}</b></td>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
            <td style="padding: 10px;"> Valor de compra: <b>@money($proposal->tradein->tradein_purchase)</b></td>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
            <td style="padding: 10px;">Valor de venda: <b>@money($proposal->tradein->tradein_sale)</b></td>
        </tr>
    </table>
@endcomponent

@component('mail::button', ['url' => "http://127.0.0.1:8000/proposals/" . $proposal->id . "/edit"])
VER PROPOSTA Nº {{ $proposal->id }}
@endcomponent

@endcomponent