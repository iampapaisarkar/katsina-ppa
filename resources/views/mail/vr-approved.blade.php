@component('mail::message')


@if($data['type'] == 'vendor-registration')
# Vendor Registration Application Approved – {{env('APP_NAME')}}
<p>Hello {{$data['user']['first_name']}} {{$data['user']['sur_name']}},</p>
<p>The Vendor Registration for {{$data['company_name']}} has been approved.</p>
<h3><strong>Vendor ID:</strong> {{$data['vendor-id']}}</h3><br>
@endif

<div>Kindly log in into your profile to download your registration certificate.</div>
<div>Thank you.</div>

{{ config('app.name') }}
@endcomponent