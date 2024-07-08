@php
    $appUrl = config('app.url');
@endphp

<x-mail::message>
# {{ __('Hello') }} {{ $contact->name }},

@if ($contact->source == 'layout1.flowform')
{{ __( 'Explanation get in touch' ) }}
@else

{{ __( 'We will contact you:' ) }}


**{{ __( 'Inquiry details:' ) }}**

<x-mail::panel>
    {{ $contact->message }}
</x-mail::panel>
@endif

**{{ __( 'Next steps:' ) }}**

{{ __( 'We have had an inquiry from you. We will get in touch asap!' ) }}

{{-- {{ __( 'Take advantage of this exclusive opportunity to create your account with just one click. Gain access to personalized support, secure storage of purchases, and seamless contracts. Act now to secure your spot and enjoy the convenience of managing all your interactions with us in one place. Don\'t miss out – click below to create your account and elevate your experience with us today!' ) }}

**<p style="text-align: center;">{{ __( 'Claim Your Account Now!' ) }}</p>**
---

<x-mail::button url="{{ $appUrl }}/admin">
{{ __( 'Create an Account' ) }}
</x-mail::button> --}}

---

{{ __( 'Thanks,' ) }}<br>
{{ config('app.name') }}
</x-mail::message>
