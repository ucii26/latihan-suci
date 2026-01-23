@component('mail::message')
# Notifikasi Reset Password

Halo {{ $notifiable->name }}!

Anda menerima email ini karena kami menerima permintaan reset password untuk akun Anda.

@component('mail::button', ['url' => $url])
Reset Password
@endcomponent

Link reset password ini akan kadaluarsa dalam 60 menit.

Jika Anda tidak meminta reset password, abaikan email ini.

Salam,
{{ config('app.name') }}
@endcomponent
