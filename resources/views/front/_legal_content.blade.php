@foreach(explode("\n", $content) as $line)
    @continue(trim($line) === '')
    @if(str_starts_with(trim($line), '## '))
        <h2>{{ trim(substr(trim($line), 3)) }}</h2>
    @else
        <p>{{ $line }}</p>
    @endif
@endforeach
