@component('mail::message')
# Dear {{ $user->username }}

Your Registration to VCASS has been successful.

Keep saving, unlock your breakthrough to financial freedom.

@component('mail::button', ['url' => config('app.url') . '/home'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
