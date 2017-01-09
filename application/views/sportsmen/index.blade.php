@layout('layouts/front-end')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <img src="{{ base_url('assets/img/front.jpg') }}" class="img-rounded img-front" alt="Font image">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="page-header">
                <h3>Onze Topsporters</h3>
            </div>
        </div>
    </div>

    {{-- Sportsmen --}}
    <div class="row">
        @foreach($data as $human)
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="">{{ $human->Name }}</a>
                        <span class="label {{ $human->union->label }} pull-right">
                            {{ $human->union->name_abbr }}
                        </span>
                    </div>

                    <div class="panel-body">

                        {{-- Information --}}
                        <div class="media">
                            <div class="media-left">
                                <a target="_blank" href="{{ $human->Information }}">
                                    <img class="img-sportsmen media-object" src="{{ base_url('assets/img/' . $human->photo) }}" alt="{{ $human->Name }}">
                                </a>
                            </div>

                            <div class="media-body">
                                {{ $human->Function }}
                            </div>
                        </div>
                        {{-- /END information --}}

                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- /Sportsmen --}}
@endsection
