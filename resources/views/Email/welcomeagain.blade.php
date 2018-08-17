@component('mail::message')
# Introduction

Hello {{ $user->name }}, Welcome to Antu Acharjee's Blog.


@component('mail::button', ['url' => 'www.larablog.dev'])
Go There
@endcomponent

@component('mail::panel', ['url' => ''])
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id a quos dignissimos?
@endcomponent

Thanks,<br>
{{ config('app.name') }} 
@endcomponent
