@layout('layouts/front-end')

@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">Account informatie</a></li>
                <li role="presentation"><a href="#point" aria-controls="home" role="tab" data-toggle="tab">Gemelde punten</a></li>
                <li role="presentation"><a href="#log" aria-controls="profile" role="tab" data-toggle="tab">Logs</a></li>
                <li role="presentation"><a href="#block" aria-controls="messages" role="tab" data-toggle="tab">Blokkeer</a></li>
            </ul>
        </div>
    </div>

    <div class="row padding-top">
        <div class="col-md-offset-2 col-md-8">
            {{-- Tab content --}}
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="info">
                        @include('users/partials/tab-info')
                    </div>

                    <div role="tabpanel" class="tab-pane" id="point">
                        @include('users/partials/tab-point')
                    </div>


                    <div role="tabpanel" class="tab-pane" id="log">
                        @include('users/partials/tab-log')
                    </div>

                    <div role="tabpanel" class="tab-pane" id="block">
                        @include('users/partials/tab-block')
                    </div>
                </div>
            {{-- /Tab content--}}
        </div>
    </div>
@endsection
