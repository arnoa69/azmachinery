@php
    $appUrl = config('app.url');
@endphp

<x-mail::message>
# {{ __('Hello Sales Agents!') }}

{{ __( 'We have an inquiry for you. Let\'s make it a success!' ) }}

{{ __( 'Here are the details:' ) }}

---
@if ($contact->source == 'layout1.flowform')
**{{ __( 'Name:' ) }}:** {{ $contact->name }}

**{{ __( 'Email:' ) }}** {{ $contact->email }}

**{{ __( 'Company:' ) }}** {{ $contact->company_name }}

**{{ __( 'Phone:' ) }}** {{ $contact->phone_number }}

---
<x-mail::panel>
**{{ __( 'Inquiry details:' ) }} {{ __( 'From Flowform!' ) }}**

**{{ __( 'Which type of flowform:' ) }}**  {{ $contact->message['flowform'] }}

**{{ __( 'What type of industry:' ) }}**  {{ $contact->message['industry'] }}

@if ($contact->message['flowform'] == 'measures')
**{{ __( 'Dimension of length needed:' ) }}**  {{ $contact->message['dimension_length'] }}

**{{ __( 'Dimension of width needed:' ) }}**  {{ $contact->message['dimension_width'] }}

**{{ __( 'Dimension of height needed:' ) }}**  {{ $contact->message['dimension_height'] }}

**{{ __( 'Weight capacity needed:' ) }}**  {{ $contact->message['weight_capacity'] }}
@endif

**{{ __( 'What delivery day:' ) }}**  {{ $contact->message['delivery_date'] }}

**{{ __( 'Quantity of ramps needed:' ) }}**  {{ $contact->message['quantity'] }}

**{{ __( 'Client comment:' ) }}**  {{ $contact->message['comments'] }}

**{{ __( 'Client IP:' ) }}**  {{ $contact->message['client_ip'] }}


</x-mail::panel>
---

**{{ __( 'Next steps:' ) }}**
{{ __( '1. Review the inquiry details.' ) }}
{{ __( '2. Contact the client to discuss further.' ) }}
{{ __( '3. Provide a timely response.' ) }}
@endif

@if ($contact->source == 'layout1.contact.form')
**{{ __( 'Name:' ) }}:** {{ $contact->name }}

**{{ __( 'Email:' ) }}** {{ $contact->email }}

**{{ __( 'Company:' ) }}** {{ $contact->company_name }}

**{{ __( 'Phone:' ) }}** {{ $contact->phone_number }}

---
<x-mail::panel>
**{{ __( 'Inquiry details:' ) }} {{ __( 'From Contact Form!' ) }}**

{{ $contact->message }}

</x-mail::panel>
---

**{{ __( 'Next steps:' ) }}**
{{ __( '1. Review the inquiry details.' ) }}
{{ __( '2. Contact the client to discuss further.' ) }}
{{ __( '3. Provide a timely response.' ) }}
@endif

@if ($contact->source == 'layout1.newsletter')
**{{ __( 'Email:' ) }}** {{ $contact->email }}

---

{{ __( 'Explanation newsletter:' ) }}

---

**{{ __( 'Next steps:' ) }}**
{{ __( '1. Transfer the email to Mailchimp or Sendgrid.' ) }}
{{ __( '2. Contact the client to discuss further.' ) }}
{{ __( '3. Provide a timely response.' ) }}
@endif

@if ($contact->source == 'layout1.we-call-you')
**{{ __( 'Phone:' ) }}** {{ $contact->phone_number }}

---

{{ __( 'Explanation call back:' ) }}

---

**{{ __( 'Next steps:' ) }}**
{{ __( '1. Try to call the client back asap' ) }}
{{ __( '2. Contact the client to discuss further.' ) }}
{{ __( '3. Provide a timely response.' ) }}
@endif
---

{{ __( 'Let\'s work together to make this inquiry a success. Stay motivated and keep up the great work!' ) }}

<x-mail::button url="{{ $appUrl }}/admin">
{{ __( 'Go to Taskmanager' ) }}
</x-mail::button>

{{ __( 'Thanks Team,' ) }}<br>
{{ config('app.name') }}
</x-mail::message>
