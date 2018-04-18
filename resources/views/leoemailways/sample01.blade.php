@component('mail::message')
# Introduction

I _send_ this email using 5.3 **mailable** ways

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
