<form class="form-horizontal" action="{{ base_url('items/create') }}" method="POST">
    {{-- CSRF --}}
    <input type="hidden" name="{{ $this->security->get_csrf_token_name() }}" value="{{ $this->security->get_csrf_hash() }}">

    {{-- Hidden inputs --}}
    {{-- ==================================== --}}
    {{-- This inputs are used to determine which sportsmen is the item for.  --}}
    <input type="hidden" name="sportsmen_id" value="{{ $human->id }}">

    {{-- item form-group --}}
    <div class="form-group">
        <label for="item" class="control-label col-md-3">
            Wansmaak puntje: <span class="text-danger">*</span>
        </label>

        <div class="col-md-9">
            <input id="item" type="text" name="item_name" placeholder="Naam van je puntje." class="form-control">
        </div>
    </div>

    {{-- Media_url form-group --}}
    <div class="form-group">
        <label for="media" class="control-label col-md-3">
            Media hyperlink: <span class="text-danger">*</span>
        </label>

        <div class="col-md-9">
            <input type="text" name="media" placeholder="Webadres naar het artikel." class="form-control">
        </div>
    </div>

    {{-- Description form-group --}}
    <div class="form-group">
        <label for="description" class="control-label col-md-3">
            Punt beschrijving: <span class="text-danger">*</span>
        </label>

        <div class="col-sm-9">
            <textarea name="description" rows="7" placeholder="Beschrijving van je punt" class="form-control" id="description"></textarea>
        </div>
    </div>

    {{-- Submit and reset form-group --}}
    <div class="form-group">
        <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn btn-md btn-warning">Insturen</button>
            <button type="reset" class="btn btn-md btn-danger">Reset formulier</button>
        </div>
    </div>

</form>
