@component('mail::message')
# Career Application

<p>First Name: {{ $data['first_name'] }}</p>
<p>Last Name: {{ $data['last_name'] }}</p>
<p>Job Role: {{ $data['job_role'] }}</p>
<p>Email: {{ $data['email'] }}</p>
<p>Phone: {{ $data['phone'] }}</p>
<p>Cover Letter: {{ $data['cover_letter'] }}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent