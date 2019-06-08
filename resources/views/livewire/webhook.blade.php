<div>
    <h1>Your webhook id: <span style="font-family: monospace">{{ $uuid }}</span></h1>
    {{--    <button wire:click="forceRefresh">Force refresh!</button>--}}
    <p>Requests received:</p>
    <ul wire:poll.500ms="forceRefresh">
        @foreach($requests as $request)
            <li>
                {{ json_encode($request) }}
            </li>
        @endforeach
    </ul>
</div>
