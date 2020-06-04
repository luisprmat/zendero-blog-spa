@component('mail::message')
# Hola

Has recibido un nuevo mensaje de contacto a través de tu aplicación.

@component('mail::table')
|              |                           |
|:------------ |:------------------------- |
| **Nombre:**  | {{ $message['name'] }}    |
| **Email:**   | {{ $message['email'] }}   |
| **Asunto:**  | {{ $message['subject'] }} |
| **Mensaje:** | {{ $message['message'] }} |
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
