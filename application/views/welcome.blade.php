@layout('layouts/front-end')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <img class="img-rounded img-front" src="{{ base_url('assets/img/front.jpg') }}" alt="BK postjes pakken">
        </div>
    </div>

    <div class="row">
        <div class="col-md-9 padding-top">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>Belgisch Kampioenschap van de wansmaak</h2>

                    <p>
                        Onze politici geven zichzelf erg graag complimentjes en goede rapporten. Alles is een success,elke uitspraak is gerechtvaardigd, en elke opinie is redelijk, bedaard en gematigd.
                    </p>

                    <p>
                        Maar net zoals in school is het rapport dat dat de leerling zichzelf geeft niet echt betrouwbaar.
                        Zo ook met onze politici. De burgers zijn degene die hen moeten beoordelen, niemand anders.
                        Daarom deze site.
                    </p>

                    <p>
                        Geef onze politici hier punten voor wansmaak. Telkens ze iets verklaren of beargumenteren kan
                        je hen een score geven. En op het einde van het jaar reiken we een trofee uit aan degene
                        die het hoogst scoort in de wansmaak-index. Die wordt dan Belgisch Kampioen van de Wansmaak.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-3 padding-top">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Informatie
                </div>
                <div class="list-group">
                    <a href="{{ base_url('participants') }}" class="list-group-item">Onze topsporters. <span class="pull-right badge">{{ $sportsmen }}</span></a>
                    <a href="{{ base_url() }}" class="list-group-item">Deelnemende ploegen. <span class="pull-right badge">{{ $teams }}</span></a>
                    <a href="{{ base_url() }}" class="list-group-item">Het klassement</a>
                </div>
            </div>
        </div>
    </div>
@endsection
