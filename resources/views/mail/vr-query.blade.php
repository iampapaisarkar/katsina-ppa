@component('mail::message')


@if($data['type'] == 'vendor-registration')
# Vendor Registration Application Query – {{env('APP_NAME')}}
<h5>Hello {{$data['user']['first_name']}} {{$data['user']['sur_name']}},</h5> <br>
<h5>The application for Vendor Registration for {{$data['company_name']}} has been queried with the following reason:  </h5> <br>
<h5><strong>Query Reason:</strong></h5>
<h5>{{$data['query']}}</h5> <br>
@endif

<div>Kindly log in into your profile to make the necessary correction and re-submit your application.</div>
<div>Thank you.</div>

{{ config('app.name') }}
@endcomponent