@if (count($human->items) > 0)
    <table class="table-condensed table-hover">
        <thead>

        </thead>
    </table>
@else
    <div class="alert alert-info">
        <strong>Info:</strong> {{ $human->Name }} heeft nog geen wansmakelijke punten vermeld in de media.
    </div>
@endif
