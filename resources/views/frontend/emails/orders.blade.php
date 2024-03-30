@component('mail::message')
# Order Confirmed

Thank you for your order.
Kindly login into your dashboard to access your purchased item.
<br>
We value your business and look forward to continuing to exceed your expectations.
Your satisfaction is our top priority.

@component('mail::button', ['url' => 'https://fmapmedia.com/login'])
Click here to login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
