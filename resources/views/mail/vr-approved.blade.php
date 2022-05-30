@component('mail::message')


@if($data['type'] == 'vendor-registration')
# Vendor Registration Application Approved – {{env('APP_NAME')}}
<h5>Hello {{$data['user']['first_name']}} {{$data['user']['sur_name']}},</h5> <br>
<h5>The Vendor Registration for {{$data['company_name']}} has been approved.</h5> <br>
<h2><strong>Vendor ID:</strong> {{$data['vendor-id']}}</h2><br>
@endif

<div>Kindly log in into your profile to download your registration certificate.</div>
<div>Thank you.</div>

{{ config('app.name') }}
@endcomponent