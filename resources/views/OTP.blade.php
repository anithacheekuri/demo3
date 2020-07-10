@component('mail::message')
# Introduction


Your OTP is {{ $OTP}}
@component('mail::button', ['url' => 'http://local.otp.com/login'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
