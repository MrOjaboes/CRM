@component('mail::message')
# Hello Admin

{{$offlinefund->user->username}} just tried to make an offline donation on your website.

Here are the transaction details

Amount: {{$offlinefund->amount}}<br>

This mail does not confirm the user has paid, please recieve visual fund before approving this transaction

@component('mail::button', ['url' => config('app.url') . '/admin'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent