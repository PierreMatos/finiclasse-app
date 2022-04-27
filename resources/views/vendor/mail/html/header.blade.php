<tr>
<td class="header" style="width: 100%; height: 100%; background-color: #000; padding: 50px;">
<a href="https://www.finiclasse.pt/" style="display: inline-block;">
@if (trim($slot) === 'Finiclasse')
<img src="https://www.finiclasse.pt/img/logo.png" alt="Finiclasse Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
