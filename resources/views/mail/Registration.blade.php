@component('mail::message')
    # Registration

    Dear {{ $user->name }},

    Thank-you for registering, your account is pending admin approval.  We will let you know when this happens :)

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
