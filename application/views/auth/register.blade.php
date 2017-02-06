@layout('layouts/front-end')

@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            @if (isset($_SESSION['class']) && isset($_SESSION['message']))
                <div role="alert" class="{{ $_SESSION['class']}} alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Success:</strong> {{ $_SESSION['message'] }}
                </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">Registreer</div>

                <div class="panel-body">
                    <form class="form-horizontal" action="{{ base_url('auth/store') }}" method="POST">
                        {{-- CSRF --}}
                        <input type="hidden" name="{{ $this->security->get_csrf_token_name() }}" value="{{ $this->security->get_csrf_hash() }}">

                        <div class="form-group {{ form_error('name') ? 'has-error' : '' }}">
                            <label class="col-md-4 control-label">
                                Naam: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <input v-model="register.name" placeholder="Voornaam Achternaam" type="name" value="{{ set_value('name') }}" class="form-control" name="name">

                                @if (form_error('name'))
                                    <span class="help-block"><small>{{ form_error('name') }}</small></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ form_error('username') ? 'has-error' : '' }}">
                            <label class="col-md-4 control-label">
                                Gebruikersnaam: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <input v-model="register.username" placeholder="Gebruikersnaam" name="username" class="form-control" value="{{ set_value('username') }}" type="text">

                                @if (form_error('username'))
                                    <span class="help-block"><small>{{ form_error('username') }}</small></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ form_error('email') ? 'has-error' : '' }}">
                            <label class="control-label col-md-4">
                                E-mail adres: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <input v-model="register.email" placeholder="Email adres" type="text" value="{{ set_value('email') }}" name="email" class="form-control">

                                @if (form_error('email'))
                                    <span class="help-block"><small>{{ form_error('email') }}</small></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ form_error('password') ? 'has-error' : '' }}">
                            <label class="control-label col-md-4">
                                Wachtwoord: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <input v-model="register.password" placeholder="Wachtwoord" type="password" name="password" class="form-control">

                                @if (form_error('password'))
                                    <span class="help-block"><small>{{ form_error('password') }}</small></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ form_error('password_confirm') ? 'has-error' : '' }}">
                            <label class="control-label col-md-4">
                                Wachtwoord bevestiging: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <input v-model="register.password_confirm" placeholder="Wachtwoord bevestiging" type="password" name="password_confirm" class="form-control">

                                @if (form_error('password_confirm'))
                                    <span class="help-block"><small>{{ form_error('password_confirm') }}</small></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ form_error('disclaimer') ? 'has-error' : '' }}">
                            <div class="col-md-offset-4 col-md-6">
                                <div class="checkbox">
                                    <label>
                                        <input v-model="register.disclaimer" type="checkbox" value="accept" name="disclaimer"> Ik accepteer de <a href="{{ base_url('disclaimer') }}" target="_blank">disclaimer</a>
                                    </label>

                                    @if (form_error('disclaimer'))
                                        <span class="help-block"><small>{{ form_error('disclaimer') }}</small></span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group" v-if="! submitted">
                            <div class="col-md-offset-4 col-md-6">
                                <button type="submit" v-attr="disabled: errorsRegister" class="btn btn-default"><span class="fa fa-check" aria-hidden="true"></span> Registreer</button>
                                <button type="reset" class="btn btn-danger"><span class="fa fa-close" aria-hidden="true"></span> Reset</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
