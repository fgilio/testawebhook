<li>
    <button wire:click="selectRequest">Details</button>
    <br>
    {{ $request->created_at }}
    <br>
    <b>{{ $request->method }}</b> from: {{ $request->host_ip }}
    <br>
    <br>
</li>
