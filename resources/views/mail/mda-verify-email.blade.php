@component('mail::message')
# Welcome Email - {{env('APP_NAME')}}

<div>Hello {{$data['user_name']}}, <br>
CONGRATULATIONS.
</div>
<div>you have been invited to the {{$data['mda_type']}} role in a MDA user. please accept our invitation before expire. and set your password after verifying.</div>
<br>
<div>Thank you.</div>

<table class="action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="center">
<table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="center">
<table border="0" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td>
<a href="{{$data['verify_url']}}" class="button button-primary" target="_blank" rel="noopener">Verify & Reset Password</a>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>

<h6><strong>EXPIRE IN {{$data['expire_in']}} MINUTES</strong></h6>

{{ config('app.name') }}
@endcomponent