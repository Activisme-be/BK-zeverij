@layout('layouts/front-end')

@section('content')
    <div class="row">
        <div class="col-md-offset-1 col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading">Helpdesk:</div>

                <div class="list-group">

                    <div class="list-group-item">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-thumbnail img-rounded" style="width: 64px; height:64px;" src="{{ base_url('assets/img/help.svg') }}" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Tutorial</h4>
                                Een tutorial die in het begin erg kan zijn.
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item">
                        <div class="media">
                            <div class="media-left">
                                <a href="{{ base_url('questions') }}">
                                    <img class="media-object img-thumbnail img-rounded" style="width: 64px; height:64px;" src="{{ base_url('assets/img/questions.svg') }}" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Vragen.</h4>
                                Via dit systeem kun jij al je vragen stellen aan admin's en ontwikkelaars van deze actie.
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-thumbnail img-rounded" style="width: 64px; height:64px;" src="{{ base_url('assets/img/log.svg') }}" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Developer log</h4>
                                Hier worden alle aanpassingen van deze actie weergegeven.
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item">
                        <div class="media">
                            <div class="media-left">
                                <a href="{{ base_url('helpdesk/rules') }}">
                                    <img class="media-object img-thumbnail img-rounded" style="width: 64px; height:64px;" src="{{ base_url('assets/img/rules.svg') }}" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Regels</h4>
                                Natuurlijk heeft ook deze actie regels. Hou jij je hier niet aan dan loop je het risico dat je account word geblokkeerd. En of verwijderd.
                            </div>
                        </div>
                    </div>

                    @if (in_array('admin', $this->user['roles']))
                        <div class="list-group-item">
                            <div class="media">
                                <div class="media-left">
                                    <a href="{{ base_url('questions/backend') }}">
                                        <img class="media-object img-thumbnail img-rounded" style="width: 64px; height:64px;" src="{{ base_url('assets/img/control-panel.svg') }}" alt="...">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Control panel vragen.</h4>
                                    Het controle paneel voor alle vragen die mensen stellen.
                                </div>
                            </div>
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
@endsection
