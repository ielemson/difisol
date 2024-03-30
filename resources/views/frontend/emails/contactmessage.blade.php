@component('mail::message')
# You have a message from {{$details['name']}}

# Subject: {{$details['subject']}} <br>
# Phone: {{$details['phone']}}  <br>
{{$details['message']}}

@component('mail::button', ['url' => 'https://luxstrandsbyspring.com/'])
Lux Strands by Springs
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
