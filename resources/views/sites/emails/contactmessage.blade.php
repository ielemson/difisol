@component('mail::message')
# You have a message from {{$details['name']}}

# Subject: {{$details['msg_subject']}} <br>
# Phone: {{$details['phone_number']}}  <br>
{{$details['message_body']}}

@component('mail::button', ['url' => 'https://fmapmedia.com/'])
www.fmapmedia.com
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
