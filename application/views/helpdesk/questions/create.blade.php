@layout('layouts/front-end')

@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading"><span class="fa fa-info-circle" aria-hidden="true"></span> Nieuwe vraag:</div>

                <div class="panel-body">
                    <div class="media">
                        <div class="media-left">
                            <a href="{{ base_url('questions') }}">
                                <img class="media-object img-thumbnail img-rounded" style="width: 64px; height:64px;" src="{{ base_url('assets/img/questions.svg') }}" alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            {{-- <h4 class="media-heading">Vragen.</h4> --}}
                            <p>
                                Wij zijn altijd bereid om je te helpen. Stel daarom ook hier je vraag. Veel van de vragen kan je vinden in onze tutorial.
                                Dus raden we je aan om deze eerst eens rustig te lezen. Indien je dan nog geen antwoord vind mag jij je vraag hier stellen;
                            </p>

                            <p>Er zijn echter ook regels waar je je aan moet houden.</p>

                            <ul>
                                <li>De helpdesk is geen pretpark.</li>
                                <li>Vragen die onnodig heropenen voor 'oke' of 'bedankt' e.d</li>
                                <li>De administrators werken vrijwillig aan deze actie. Heb dus respect voor deze mensen.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading"><span class="fa fa-plus" aria-hidden="true"></span> Stel je vraag:</div>

                <div class="panel-body">
                    <form class="form-horizontal" action="" method="post">
                        {{-- CSRF --}}
                        <input type="hidden" name="{{ $this->security->get_csrf_token_name() }}" value="{{ $this->security->get_csrf_hash() }}">

                        <div class="form-group">
                            <label class="control-label col-sm-2">
                                Titel: <span class="text-danger">*</span>
                            </label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="title" placeholder="Titel van je vraag">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2">
                                Categorie: <span class="text-danger">*</span>
                            </label>

                            <div class="col-sm-4">
                                <select class="form-control" name="category">
                                    <option value="">-- Selecteer de categorie: --</option>

                                    @foreach($categories as $category)
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
