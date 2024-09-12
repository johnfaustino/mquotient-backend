@component('mail::message')
# Contact Us Mail Feedback

<p>First Name: {{ $data['first_name'] }}</p>
<p>Last Name: {{ $data['last_name'] }}</p>
<p>Email: {{ $data['email'] }}</p>
<p>Phone: {{ $data['phone'] }}</p>
<p>Inquiry: {{ $data['message'] }}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent