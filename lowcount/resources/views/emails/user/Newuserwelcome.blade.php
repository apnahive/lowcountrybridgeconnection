@component('mail::message')
# Welcome to Low Count

Please confirm your email address by clicking the link below. We may need to send you important information about our service and it is important that we have an accurate email address.


@component('mail::button', ['url' => 'https://lowcount.banditcodes.com'])
Confirm email address
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
