@component('mail::message')
# Register Camp {{$checkouts->Camp->title}}

Hi, {{$checkouts->User->name}}
<br>
Thank you for register on <b>{{$checkouts->Camp->title}}</b>, please see payment instruction by click the button below

@component('mail::button', ['url' => route('user.checkout.invoice', $checkouts->id)])
Get Invoice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
