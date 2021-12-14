@component('mail::message')
# Validação RGPD

**Nome:** {{ $user->name }}

**E-mail:** {{ $user->email }}


@component('mail::button', ['url' => route('storeValidateRGPD',$user->id), 'color' => 'green'])
CONFIRMAR VALIDAÇÃO
@endcomponent

Obrigado por nos escolher.

Cumprimentos,<br>
{{ config('app.name') }}
@endcomponent