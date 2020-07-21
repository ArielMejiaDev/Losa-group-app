@component('mail::message')
# {{ __('Hi') .' ' . $user->name }}

{{ __('Losa invite you to be an admin user') }}

{{ __('Please confirm your new role by clicking here') }}.

@component('mail::button', ['url' => config('app.url') . "/confirm-admin-role/{$user->email}"] )
{{ __('Confirm') }}
@endcomponent

{{ __('Thanks') }},<br>
{{ config('app.name') }}
@endcomponent
