@component('mail::layout')
{{-- Pretext --}}
@slot('pretext')
<tr>
<td>
<span>{{ $pretext ?? '' }}</span>
</td>
</tr>
@endslot
{{-- Header --}}
@slot('header')
<tr>
<td class="header">
<a href={{ config('app.url') }}" style="display: inline-block;">
<img src="https://i.imgur.com/X1HPpVj.png" class="logo">
</a>
</td>
</tr>
@endslot

{{-- Body --}}
{{ $slot }}

Thank you,<br>
Rob Serrate
{{-- Subcopy --}}
{{-- @isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset --}}
{{-- Footer --}}
@slot('footer')
@component('mail::footer')
{{-- © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.') --}}
@endcomponent
@endslot
@endcomponent
