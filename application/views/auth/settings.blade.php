@layout('layouts/front-end')

@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Account configuratie:</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ base_url('account/update') }}">
                        {{-- CSRF --}}
                        <input type="hidden" name="{{ $this->security->get_csrf_token_name() }}" value="{{ $this->security->get_csrf_hash() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                Naam: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <input type="name" v-model="accountSettings.name" value="{{ $this->user['name'] }}" placeholder="Uw naam" class="form-control" name="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                Gebruikersnaam: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <input name="username" v-model="accountSettings.username" class="form-control" placeholder="Gebruikersnaam" value="{{ $this->user['username'] }}" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">
                                E-mail adres: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <input type="text" name="email" v-model="accountSettings.email" value="{{ $this->user['email'] }}" placeholder="Email adres" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">
                                Wachtwoord: {{-- <span class="text-danger">*</span> --}}
                            </label>

                            <div class="col-md-6">
                                <input type="password" name="password" placeholder="Wachtwoord" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">
                                Wachtwoord bevestiging: {{-- <span class="text-danger">*</span> --}}
                            </label>

                            <div class="col-md-6">
                                <input type="password" name="password_confirm" placeholder="Wachtwoord bevestiging" class="form-control">
                            </div>
                        </div>

                        <div class="form-group" v-if="! submitted">
                            <div class="col-md-offset-4 col-md-6">
                                <button type="submit" v-attr="disabled: errorsSettings" class="btn btn-default">Registreer</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
