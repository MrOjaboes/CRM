@component('mail::message')
# Dear {{ $users->username }}

Your payment via Offline method has been recieved and approved.

Below are your transaction details

# Details
Amount: ${{$transaction->amount}}<br>
Reference: {{$transaction->reference}}<br>

Keep saving, and unlock your breakthrough to financial freedom.

@component('mail::button', ['url' => config('app.url') . '/home'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
