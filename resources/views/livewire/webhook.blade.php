<div>
    <h1>Your endpoint: <span style="font-family: monospace">{{ $url }}</span></h1>
    {{--    <button wire:click="forceRefresh">Force refresh!</button>--}}
    <p>Requests received:</p>
    <ul wire:poll.1000ms="$refresh">
        @foreach($requests as $request)
            <li>
                {{ json_encode($request) }}
            </li>
        @endforeach
    </ul>
    <button wire:click="cleanUp">Clean up!</button>
</div>
