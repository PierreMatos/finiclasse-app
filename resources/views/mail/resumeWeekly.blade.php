@component('mail::message')
<h1 style="text-align: center; font-size: 20px; font-weight: bold; text-decoration: underline;">Resumo My Finiclasse</h1>

<br>

@component('mail::table')
  <table style="border-collapse: collapse;">
      <tr style="border-bottom: 1px solid #C2C2C2;">
          <th style="text-align: left; text-transform: uppercase; background-color: #C2C2C2; padding: 10px; border: none;">Resumo Semanal</th>
      </tr>
      <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
        <td style="padding: 10px;">Novos carros: <b>{{ $cars }}</b></td>
      </tr>
      <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
        <td style="padding: 10px;">Novos clientes: <b>{{ $users }}</b></td>
      </tr>
      <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
          <td style="padding: 10px;">Propostas abertas: <b>{{ $proposalsOpen }}</b></td>
      </tr>
      <tr style="border-bottom: 1px solid rgba(112, 112, 112, 21%);">
          <td style="padding: 10px;">Propostas fechadas: <b>{{ $proposalsClose }}</b></td>
      </tr>
  </table>
@endcomponent

<br>

<h2 style="text-align: center;">FINICLASSE</h2>
@endcomponent
