@component('mail::message')
# Introduction

The body of your message.
<p>Please use the following code to verify your email address: {{ $code }}</p>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{-- {{ config('app.name') }} --}}
@endcomponent
