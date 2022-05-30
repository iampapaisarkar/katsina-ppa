@component('mail::message')


@if($data['type'] == 'vendor-registration')
# Payment Query – {{env('APP_NAME')}}
<p>Hello {{$data['user']['first_name']}} {{$data['user']['sur_name']}},</p>
<p>The payment made for your Application for Vendor Registration has been queried due to the following reason: </p>
<p><strong>Payment Query Reason:</strong></p>
<p>{{$data['query']}}</p>
@endif

<div>Kindly log in into you profile to make the necessary adjustment in the payment.</div>
<div>Thank you.</div>

{{ config('app.name') }}
@endcomponent