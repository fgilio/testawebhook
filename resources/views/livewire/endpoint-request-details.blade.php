<div>
    <h2>Request details:</h2>
    <br>
    <b>headers:</b>
    <br>
    {{ json_encode($request->headers, JSON_PRETTY_PRINT) }}
    <br>
    <b>Payload:</b>
    <br>
    {{ json_encode($request->payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) }}
</div>
