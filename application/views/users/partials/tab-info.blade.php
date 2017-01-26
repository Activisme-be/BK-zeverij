<div class="panel panel-default">
    <div class="panel-body">
        {{-- Tab content --}}
            @if(! is_null($human->ban))
                <div class="alert alert-danger">
                    <strong>Geblokkeerd: op {{ $human->ban->created_at }} </strong>

                    <p>wegens: {{ $human->ban->reason}}</p>
                    <p><a href="{{ base_url('users/unblock/' . $human->id) }}" class="btn btn-sm btn-danger">Activeren</a></p>
                </div>
            @endif

            <form class="form-horizontal" action="" method="POST">
                {{-- CSRF --}}
                <input type="hidden" name="{{ $this->security->get_csrf_token_name() }}" value="{{ $this->security->get_csrf_hash() }}">

                <div class="form-group">
                    <label class="control-label col-md-3">Naam:</label>

                    <div class="col-sm-9">
                        <input type="text" disabled class="form-control" value="{{ $human->name }}" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Gebruikersnaam:</label>

                    <div class="col-md-9">
                        <input type="text" disabled class="form-control" value="{{ $human->username }}" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Email adres:</label>

                    <div class="col-md-9">
                        <input type="text" disabled class="form-control" value="{{ $human->email }}" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Aangemaakt op: </label>

                    <div class="col-md-9">
                        <input type="text" disabled class="form-control" value="{{ $human->created_at}}" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Laast bijgewerkt: </label>

                    <div class="col-md-9">
                        <input type="text" disabled class="form-control" value="{{ $human->updated_at }}" />
                    </div>
                </div>
            </form>
        {{-- /Tab content --}}
    </div>
</div>
