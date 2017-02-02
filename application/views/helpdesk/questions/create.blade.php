@layout('layouts/front-end')

@section('content')
    <div class="row">
        {{-- Flash session --}}
        @if (isset($_SESSION['class']) && $_SESSION['message'])
            <div class="{{ $_SESSION['class'] }}" role="alert">
                {{ $_SESSION['message'] }}
            </div>
        @endif
        {{-- /Flash ession --}}

        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="fa fa-info-circle" aria-hidden="true"></span> Nieuwe vraag:
                    <a href="{{ base_url('helpdesk') }}" class="pull-right label label-primary">Terug naar de helpdesk</a>
                </div>

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
                                Wij zijn altijd bereid om je te helpen. Stel daarom ook hier je vraag. Veel van de vragen kan je vinden in onze tutorial. <br>
                                Dus raden we je aan om deze eerst eens rustig te lezen. Indien je dan nog geen antwoord vind mag jij je vraag hier stellen.
                            </p>

                            <p>Er zijn echter ook regels waar je je aan moet houden.</p>

                            <ul class="list-unstyled">
                                <li>* De helpdesk is geen pretpark.</li>
                                <li>* Vragen die onnodig heropenen voor 'oke' of 'bedankt' e.d</li>
                                <li>* De administrators werken vrijwillig aan deze actie. Heb dus respect voor deze mensen.</li>
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
                    <form class="form-horizontal" action="{{ base_url('questions/store') }}" method="post">
                        {{-- CSRF --}}
                        <input type="hidden" name="{{ $this->security->get_csrf_token_name() }}" value="{{ $this->security->get_csrf_hash() }}">

                        <div class="form-group {{ form_error('title') ? 'has-error' : '' }}">
                            <label class="control-label col-sm-2">
                                Titel: <span class="text-danger">*</span>
                            </label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="{{ set_value('title') }}" name="title" placeholder="Titel van je vraag">

                                @if (form_error('title'))
                                    <span class="help-block"><small>{{ form_error('title') }}</small></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ form_error('category') ? 'has-error' : '' }}">
                            <label class="control-label col-sm-2">
                                Categorie: <span class="text-danger">*</span>
                            </label>

                            <div class="col-sm-4">
                                <select class="form-control" name="category">
                                    <option value="">-- Selecteer de categorie: --</option>

                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category }}</span>
                                    @endforeach
                                </select>

                                @if (form_error('category'))
                                    <span class="help-block"><small>{{ form_error('category') }}</small></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ form_error('description') ? 'has-error' : '' }}">
                            <label class="control-label col-sm-2">
                                Vraag: <span class="text-danger">*</span>
                            </label>

                            <div class="col-sm-6">
                                <textarea name="description" rows="8" class="form-control" value="{{ set_value('description') }}" placeholder="Uw vraag"></textarea>

                                @if (form_error('description'))
                                    <span class="help-block"><small>{{ form_error('description') }}</small></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ form_error('publish') ? 'has-error' : '' }}">
                            <label class="control-label col-sm-2">
                                Publiek: <span class="text-danger">*</span>
                            </label>

                            <div class="col-sm-4">
                                <div class="radio">
                                    <label style="margin-right: 10px;"><input type="radio" name="publish" value="Y">Ja</label>
                                    <label><input type="radio" name="publish" value="N">Nee</label>
                                </div>

                                @if (form_error('publish'))
                                    <span class="help-block"><small>{{ form_error('publish') }}</small></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ form_error('agreement') ? 'has-error' : '' }}">
                            <label class="control-label col-sm-2">
                                Voorwaarden: <span class="text-danger">*</span>
                            </label>

                            <div class="col-sm-4">
                                <label class="checkbox-inline"><input type="checkbox" name="agreement" value="accept">
                                    Ik accepteer de voorwaarden.
                                </label>

                                @if(form_error('agreement'))
                                    <span class="help-block"><small>{{ form_error('agreement') }}</small></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-sm btn-success"><span class="fa fa-plus" aria-hidden="true"></span> Insturen</button>
                                <button type="reset" class="btn btn-sm btn-danger"><span class="fa fa-close" aria-hidden="true"></span> Reset</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
