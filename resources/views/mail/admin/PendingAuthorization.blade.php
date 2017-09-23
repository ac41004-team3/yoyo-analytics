@component('mail::message')
# Registration

{{ $user->name }} ({{$user->email}}) registered and is pending approval.

@component('mail::button', ['url' => ''])
Approve
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
