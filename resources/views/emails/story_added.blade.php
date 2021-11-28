@component('mail::message')
# Story Added

A new story was recently added on {{ config('app.name') }} with following details:

## Title:
{{ $title }}

## Description:
{{ $description }}

To approve it, please click the following link:
@component('mail::button', ['url' => $url])
Approve
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
