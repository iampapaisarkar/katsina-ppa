@component('mail::message')


@if($data['type'] == 'vendor-registration')
# Vendor Registration Application Query – {{env('APP_NAME')}}
<p>Hello {{$data['user']['first_name']}} {{$data['user']['sur_name']}},</p>
<p>The application for Vendor Registration for {{$data['company_name']}} has been queried with the following reason:  </p>
<p><strong>Query Reason:</strong></p>
<p>{{$data['query']}}</p>
@endif

<div>Kindly log in into your profile to make the necessary correction and re-submit your application.</div>
<div>Thank you.</div>

{{ config('app.name') }}
@endcomponent