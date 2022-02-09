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
            <td style="padding: 10px;">Marca: <b>SEAT</b></td>
            <td style="padding: 10px;">Modelo: <b>Ibiza</b></td>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;">Km: <b>100.000</b></td>
            <td style="padding: 10px;">Ano/mês: <b>12/2002</b></td>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
            <td style="padding: 10px;">Valor: <b>12.000.00 €</b></td>
        </tr>
    </table>
@endcomponent

@component('mail::button', ['url' => "http://127.0.0.1:8000/proposals/" . $proposal->id . "/edit"])
VER PROPOSTA Nº {{ $proposal->id }}
@endcomponent

@endcomponent