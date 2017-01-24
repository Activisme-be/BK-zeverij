@layout('layouts/front-end')

@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            @if (isset($_SESSION['class']) && isset($_SESSION['message']))
                <div class="{{ $_SESSION['class'] }}">
                    {{ $_SESSION['message'] }}
                </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">Inloggen</div>

                <div class="panel-body">
                    <form class="form-horizontal" action="{{ base_url('auth/verify') }}" method="post">
                        {{-- CSRF --}}
                        <input type="hidden" name="{{ $this->security->get_csrf_token_name() }}" value="{{ $this->security->get_csrf_hash() }}">

                        <div class="form-group">
                            <label class="control-label col-sm-4">Email adres: </label>

                            <div class="col-sm-6">
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4">Wachtwoord:</label>

                            <div class="col-sm-6">
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Inloggen</button>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#resetPass">Wachtwoord vergeten</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('auth/reset') {{-- Reset password modal --}}
@endsection
