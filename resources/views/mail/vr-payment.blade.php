@component('mail::message')


@if($data['type'] == 'vendor-registration')
# Payment Query – {{env('APP_NAME')}}
<h5>Hello {{$data['user']['first_name']}} {{$data['user']['sur_name']}},</h5> <br>
<h5>The payment made for your Application for Vendor Registration has been queried due to the following reason: </h5> <br>
<h5><strong>Payment Query Reason:</strong></h5>
<h5>{{$data['query']}}</h5> <br>
@endif

<div>Kindly log in into you profile to make the necessary adjustment in the payment.</div>
<div>Thank you.</div>

{{ config('app.name') }}
@endcomponent