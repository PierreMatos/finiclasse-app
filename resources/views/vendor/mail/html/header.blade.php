<tr>
    <td class="header" style="width: 100%; height: 100%; background-color: #000; padding: 50px;">
        <a href="https://www.finiclasse.pt/" style="display: inline-block;">
            @if (trim($slot) === 'Finiclasse')
                <img src="{{ URL::asset('storage/images/logo.png') }}" alt="Finiclasse Logo"
                    style="width: 187px; height: 35px;">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
