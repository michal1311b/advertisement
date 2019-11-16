@component('mail::message')
{{ trans('sentence.register-subscribtion-thanks') }}

<br>
<br>
{{ trans('sentence.confirm-link') }}
<a href="{{ url('verify/subscribtion/' . $token) }}">Click</a>

@endcomponent