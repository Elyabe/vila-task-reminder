@component('mail::message')
# Hello!

Reminde you for your task <b>{{ $task->getTitle() }}</b>
at {{ $task->getDate()->format('Y-m-d H:i') }}

@component('mail::button', ['url' => ''])
I understand
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
