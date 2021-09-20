@component('mail::message')
# Validação RGPD

**Nome:** {{ $user->name }}

**E-mail:** {{ $user->email }}

<p>Lorem ipsum</p>

@component('mail::button', ['url' => 'http://127.0.0.1:8000/storeValidateRGPD/'.$user->id, 'color' => 'green'])
CONFIRMAR VALIDAÇÃO
@endcomponent

Obrigado por nos escolher.

Cumprimentos,<br>
{{ config('app.name') }}
@endcomponent