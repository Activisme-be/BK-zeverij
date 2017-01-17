@layout('layouts/front-end')

@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Account configuratie:</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ base_url('account/update') }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                Naam: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <input type="name" value="{{ $this->user['name'] }}" placeholder="Uw naam" class="form-control" name="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                Gebruikersnaam: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <input name="username" class="form-control" placeholder="Gebruikersnaam" value="{{ $this->user['username'] }}" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">
                                E-mail adres: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <input type="text" name="email" value="{{ $this->user['email'] }}" placeholder="Email adres" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">
                                Wachtwoord: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <input type="password" name="password" placeholder="Wachtwoord" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">
                                Wachtwoord bevestiging: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <input type="password" name="password_confirm" placeholder="Wachtwoord bevestiging" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-6">
                                <button type="submit" class="btn btn-default">Wijzigen</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
