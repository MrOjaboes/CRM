@component('mail::message')
# Hello Admin

{{$loan->user->username}} just applied for loan.

Kindly login to Review his request and qualification!

@component('mail::button', ['url' => config('app.url') . '/admin'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent