@component('mail::message')
Thanks for register to newsletter click link below to confirm subscrbtion.

<br>
<br>
Here is answer link: 
<a href="{{ url('verify/subscribtion/' . $token) }}">Click</a>

@endcomponent