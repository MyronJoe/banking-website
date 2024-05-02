@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
            @foreach($utilities as $item)
            <img src="frontend/assets/uploads/{{$item->whiteLogo}}" class="logo" alt="MIDDFIRST">
            @endforeach
            @foreach($utilities as $item)
            <img src="frontend/assets/uploads/{{$item->whiteLogo}}" class="logo" alt="Thank you for joining Middfirst">
            @endforeach
            @else
            {{ $slot }}
            @endif
        </a>
    </td>
</tr>