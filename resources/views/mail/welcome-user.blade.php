@component('mail::message')
**Hi {{ $first_name }},**

Thank you for signing up for {{ config('app.name') }}! We're excited to have you as a guest! To get started, click the button below to visit the Guest Portal.

@component('mail::button', ['url' => route('guest.dashboard') ])
    Open the Guest Portal
@endcomponent

@endcomponent
