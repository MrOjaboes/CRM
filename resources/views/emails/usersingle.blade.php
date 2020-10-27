
@component('mail::message')

Dear, {{$transaction->user->username}}

You requested for your transactions details!

Find attached document and download.



Thanks,<br>
{{ config('app.name') }}
@endcomponent
