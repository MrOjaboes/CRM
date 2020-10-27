@component('mail::message')
# Dear {{ $user->username }}

We happy to inform you that your loan has been fully paid!.

Below are ythe loan details

# Details
Amount: ${{$loan->amount}}<br>
Paid Date: {{$loan->update_at}}

You can now apply for another loan when needed!

@component('mail::button', ['url' => config('app.url') . '/home'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent