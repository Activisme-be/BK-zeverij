@layout('layouts/front-end')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <img class="img-rounded img-front" src="{{ base_url('assets/img/front.jpg') }}" alt="BK postjes pakken">
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">

        </div>

        <div class="col-sm-3 padding-top">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Informatie
                </div>
                <div class="list-group">
                    <a href="{{ base_url() }}" class="list-group-item">Onze topsporters. <span class="pull-right badge">{{ $sportsmen }}</span></a>
                    <a href="{{ base_url() }}" class="list-group-item">Deelnemende ploegen. <span class="pull-right badge">{{ $teams }}</span></a>
                    <a href="{{ base_url() }}" class="list-group-item">Het klassement</a>
                </div>
            </div>
        </div>
    </div>
@endsection
