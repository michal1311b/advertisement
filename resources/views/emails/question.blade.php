There was a question from {{ $contact['first_name'] }}, {{ $contact['phone'] }}:<br><br>
{!! $contact['message'] !!}

<br>
<br>
Here is answer link: 
<a href="{{url('user/contacts/'. $contact['id'] . '/reply')}}">Click</a>