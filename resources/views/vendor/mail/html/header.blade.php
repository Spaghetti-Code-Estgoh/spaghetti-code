<tr>
<td class="header">
<a href="/" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
        <img src="https://i.ibb.co/48V7BK9/logo2.png"  class="img-responsive">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
