@component('mail::message')
# Cliente interesado

## Nombre: {{$nombre ?? 'Sin Nombre'}}
## Teléfono: {{$telefono ?? '123456789'}}
<br>
<br>

{{$mensaje ?? 'Sin mensaje'}}

{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

gracias<br>
{{ config('app.name') }}
@endcomponent
