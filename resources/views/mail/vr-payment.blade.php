@component('mail::message')


@if($data['type'] == 'vendor-registration')
# Payment Query – {{env('APP_NAME')}}
<div>Hello {{$data['user']['first_name']}} {{$data['user']['sur_name']}}, <br>
<div>The payment made for your Application for Vendor Registration has been queried due to the following reason: </div>
<div><strong>Payment Query Reason:</strong></div>
<div>{{$data['query']}}</div>
@endif

<div>Kindly log in into you profile to make the necessary adjustment in the payment.</div>
<div>Thank you.</div>

{{ config('app.name') }}
@endcomponent