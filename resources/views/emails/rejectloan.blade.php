@component('mail::message')
# Dear {{ $user->username }}

Sorry your loan request was not approved!.

After due considertion for the Loan committee, we are sad to tell you that your loan request was not approved.

This disapproval may be due to the fact that you have not met all guildlines to request for loan.

Do try to apply again next time.

# Details
Amount: ${{$loan->amount}}<br>

Don't forget to keep saving for a better tommorrow!

@component('mail::button', ['url' => config('app.url') . '/home'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
