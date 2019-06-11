<div>
    <p>{{ count($requests) }} Requests:</p>
    <ol wire:poll.10000ms="$refresh">
        @foreach($requests as $request)
            @livewire('endpoint-request', $request, key($request->id))
        @endforeach
    </ol>
    {{--    <button wire:click="cleanUp">Clean up!</button>--}}
</div>
