@layout('layouts/front-end')

@section('content')
    <div class="row">

        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="fa fa-question-circle-o" aria-hidden="true"></span> Vragen:</div>
                <div class="panel-body">
                    <div class="media">
                        <div class="media-left">
                            <img class="media-object img-thumbnail img-rounded" style="width: 64px; height:64px;" src="{{ base_url('assets/img/questions.svg') }}" alt="...">
                        </div>
                        <div class="media-body">
                            <p>
                                De vragen helpdesk is de plak waar jij al je vragen kunt stellen omtrent deze actie. Of heb
                                Je een foutje gevonden? Meld het ons!<br>
                                Onze medewerkers zullen alle moeite doen om al je vragen te beantwoorden.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading"><span class="fa fa-bar-chart" aria-hidden="true"></span> Statistiek:</div>

                <div class="list-group">
                    <a href="#" class="list-group-item">
                        <span class="fa fa-asterisk fa-btn" aria-hidden="true"></span> Aantal vragen behandeld.
                        <span class="label label-danger pull-right">2000</span>
                    </a>

                    <a href="#" class="list-group-item">
                        <span class="fa fa-asterisk fa-btn" aria-hidden="true"></span> Aantal vragen onbehandeld:
                        <span class="label label-success pull-right">558</span>
                    </a>

                    <a href="#" class="list-group-item">
                        <span class="fa fa-asterisk fa-btn" aria-hidden="true"></span> Totaal aantal vragen:
                        <span class="label label-info pull-right">{{ $all }}</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="fa fa-asterisk" aria-hidden="true"></span> Opties:</div>

                <div class="list-group">
                    <a href="#" class="list-group-item"><span class="fa fa-btn fa-plus" aria-hidden="true"></span> Stel een nieuwe vraag.</a>
                    <a href="#" class="list-group-item"><span class="fa fa-btn fa-user" aria-hidden="true"></span> Bekijk jouw vragen.</a>
                    <a href="#" class="list-group-item"><span class="fa fa-btn fa-globe" aria-hidden="true"></span> Bekijk de publieke vragen.</a>
                </div>
            </div>
        </div>

    </div>
@endsection
