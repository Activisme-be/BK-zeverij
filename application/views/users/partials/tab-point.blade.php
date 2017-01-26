<div class="panel panel-default">
    <div class="panel-body">
        {{-- Tab content --}}
            @if ((int) count($human->items) === 0)
                <div class="alert alert-info">
                    <strong>Info:</strong> Deze gebruiker heeft nog geen puntjes gemeld.
                </div>
            @endif
        {{-- /Tab content --}}
    </div>
</div>
