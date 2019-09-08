<div>
    <p>{{ count($requests) }} Requests:</p>
    <br>
    <ol wire:poll.5000ms="$refresh">
        @foreach($requests as $request)
            @livewire('endpoint-request', $request, key($request->id))
        @endforeach
    </ol>
    <br>
    <br>
    <button wire:click="cleanUp">Clean up!</button>
</div>
