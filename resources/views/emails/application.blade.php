@component('mail::message')
New application is in Your dashboard. Attached is a CV.
<br>
Log in to answer for application. <a href="{{ route('show-room', $room) }}" style="color: red"><b>Click here</b></a>

<br>
<span style="color: red"><b>Don't answer this message!</b></span>

@endcomponent