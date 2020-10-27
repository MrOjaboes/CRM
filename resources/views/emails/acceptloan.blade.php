@component('mail::message')
# Dear {{ $user->username }}

We are happy to inform you that your loan request has been approved!.

Below are your transaction details

# Details
Amount: ${{$loan->amount}}<br>

Do keep in mind that you are mandated to pay your loan on or before the validity period you choose.

@component('mail::button', ['url' => config('app.url') . '/home'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
