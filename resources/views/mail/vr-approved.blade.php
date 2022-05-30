@component('mail::message')


@if($data['type'] == 'vendor-registration')
# Vendor Registration Application Approved – {{env('APP_NAME')}}
<div>Hello {{$data['user']['first_name']}} {{$data['user']['sur_name']}}, <br>
<div>The Vendor Registration for {{$data['company_name']}} has been approved.  </div>
<h2><strong>Vendor ID:</strong> {{$data['vendor-id']}}</h2>
@endif

<div>Kindly log in into your profile to download your registration certificate.</div>
<div>Thank you.</div>

{{ config('app.name') }}
@endcomponent