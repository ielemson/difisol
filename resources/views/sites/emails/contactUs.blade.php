@component('mail::message')
# You have a new message

$

@component('mail::button', ['url' => ''])
Click here to login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
