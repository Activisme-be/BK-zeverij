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

                    <p class="lead">Stem op de wansmakelijkste politici!</p>

                    <p>
                        Onze politici geven zichzelf erg graag complimentjes en goede rapporten. Ze vinden hun eigen optredens vaak een succes, hun uitspraken gerechtvaardigd en hun meningen doordacht.
                    </p>

                    <p>                       
                        Maar net zoals in school is het rapport dat de politicus zichzelf geeft niet echt betrouwbaar. 
                        De burgers zijn degenen die het beste kunnen beoordelen of de politicus getuigt van goede smaak. Daarom deze site.
                    </p>

                    <p>
                        Zo ook met onze politici. De burgers zijn degene die hen moeten beoordelen, niemand anders.
                    </p>

                    <p>
                        Geef onze politici hier punten voor wansmaak. Telkens als ze iets verklaren of beargumenteren kan
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
                    <a href="{{ base_url('ranking') }}" class="list-group-item">Het klassement</a>
                </div>
            </div>
        </div>
    </div>
@endsection
