@component('mail::message')
<h1 style="text-align: center; font-size: 20px; font-weight: bold; text-decoration: underline;">Proposta Comercial</h1>

<br><br>
<div>
    <p style="line-height: 0em;">Obrigado pela sua preferência!</p>
    <p>O vendedor X envia a sua proposta.</p>
</div>

@component('mail::table')
  <table style="border-collapse: collapse;">
    <tr style="border-bottom: 1px solid #C2C2C2;">
      <th style="text-align: left; text-transform: uppercase; background-color: #C2C2C2; padding: 10px; border: none;">Dados Cliente</th>
    </tr>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
      <td style="padding: 10px;">Nome: <b>João F. Carvalho</b></td>
    </tr>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
        <td style="padding: 10px;">E-mail: <b>franciscocarvalho88@gmail.com</b></td>
    </tr>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
        <td style="padding: 10px;">Telefone: <b>111 111 111</b></td>
    <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
        <td style="padding: 10px;">NIF: <b>111 111 111</b></td>
    </tr>
  </table>
@endcomponent

@component('mail::table')
    <table style="border-collapse: collapse;">
        <tr style="border-bottom: 1px solid #C2C2C2;">
            <th style="text-align: left; text-transform: uppercase; background-color: #C2C2C2; padding: 10px; border: none;">Viatura</th>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
            <td style="padding: 0px;"><img src="{{ asset($proposal->car->getFirstMediaUrl('cars'))}}" /></td>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
            <td style="padding: 10px;">Tipo: <b>NOVO</b></td>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;">Marca: <b>Mercedez-Benz</b></td>
            <td style="padding: 10px;">Modelo: <b>GLB 300d</b></td>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
            <td style="padding: 10px;">Valor: <b>52.899.99 €</b></td>
        </tr>
    </table>
@endcomponent

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

@component('mail::table')
    <table style="border-collapse: collapse;">
        <tr style="border-bottom: 1px solid #C2C2C2;">
            <th style="text-align: left; text-transform: uppercase; background-color: #C2C2C2; padding: 10px; border: none;">Apoio</th>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;">Tipo: <b>Apoio frotista</b></td>
            <td style="padding: 10px;"><b>8 %</b></td>
        </tr>
    </table>
@endcomponent

@component('mail::table')
    <table style="border-collapse: collapse;">
        <tr style="border-bottom: 1px solid #C2C2C2;">
            <th style="text-align: left; text-transform: uppercase; background-color: #C2C2C2; padding: 10px; border: none;">Financiamento</th>
        </tr>
        <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%); display: flex; justify-content: space-between;">
            <td style="padding: 10px;">Tipo: <b>Externo</b></td>
            <td style="padding: 10px;"><b>Aguardar envio de avaliação</b></td>
        </tr>
    </table>
@endcomponent

@component('mail::table')
    <table style="border-collapse: collapse;">
        <tr style="border-bottom: 1px solid #C2C2C2;">
            <th style="text-align: left; text-transform: uppercase; background-color: #C2C2C2; padding: 10px; border: none;">Proposta Nº 890</th>
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