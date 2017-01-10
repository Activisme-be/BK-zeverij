@layout('layouts\front-end')

@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Inloggen</div>

                <div class="panel-body">
                    <form class="form-horizontal" action="" method="post">

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
                                <a class="btn btn-link" href="">Forgot Your Password?</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
