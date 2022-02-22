@component('mail::message')
<h1 style="text-align: center; font-size: 20px; font-weight: bold; text-decoration: underline;">Validação RGPD</h1>

<br>
<div>
    <p>Os seus dados foram submetidos para validação do RGPD, através do nosso departamento de vendas.</p>
    <p>Caso pretenda consultar as nossas Políticas de Privacidade e Dados, os link encontra-se em baixo.</p>
</div>

<div style="padding: 0px 100px 0px 100px;">
    @component('mail::table')
    <table style="border-collapse: collapse;"> 
      <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
        <td style="padding: 10px;">Nome: <b>{{ $user->name }}</b></td>
      </tr>
      <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
          <td style="padding: 10px;">E-mail: <b>{{ $user->email }}</b></td>
      </tr>
      <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
          <td style="padding: 10px;">Telefone: <b>{{ $user->mobile_phone }}</b></td>
      <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
          <td style="padding: 10px;">NIF: <b>{{ $user->nif }}</b></td>
      </tr>
    </table>
  @endcomponent 
</div>

@component('mail::button', ['url' => route('storeValidateRGPD', $user->id), 'color' => 'green'])
Confirmar validação
@endcomponent

<br>
<div>
    <p style="line-height: 0em;">Obrigado por nos escolher!</p>
    <p>Com os melhores cumprimentos,</p>
</div>

{{ config('app.name') }}
@endcomponent