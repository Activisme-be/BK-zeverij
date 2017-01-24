@layout('layouts/front-end')

@section('content')
    <div class="row">
        <div class="col-md-12">

            {{-- search form --}}
            <div class="pull-left">
                <form class="form-inline" action="{{ base_url('items/search') }}" method="GET">
                    <input type="text" name="term" placeholder="Zoekterm" class="form-control">
                    <button class="btn btn-danger">
                        <span class="fa fa-search"></span> Zoek
                    </button>
                </form>
            </div>
            {{-- /search form --}}

            {{-- Item creation  button --}}
            {{-- TODO: Create the modal --}}
            <div class="pull-right">
                <button type="button" data-toggle="modal" data-target="#newItem" class="btn btn-success">Wansmakelijk puntje toevoegen</button>
            </div>
            {{-- /Item creation button --}}

        </div>
    </div>

    <div class="row padding-top">
        <div class="col-md-12">
            @if((int) count($items) > 0)
                <div class="panel panel-default">
                    <div class="panel-body">

                        {{-- Item table  --}}
                        <table class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>#</th>              {{-- [item]: id --}}
                                    <th>Status:</th>        {{-- [item]: status --}}
                                    <th>Politici:</th>      {{-- [item]: sportsmen id --}}
                                    <th>Punt:</th>          {{-- [item]: name --}}
                                    <th></th>               {{-- Reserved for functions --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                    @if((string) $item->status == '1')
                                        <tr class="success">
                                    @elseif((string) $item->status == '0')
                                        <tr class="danger">
                                    @else
                                        <tr>
                                    @endif

                                        <td><code>#I{{ $item->id }}</code></td>

                                        {{-- Status --}}
                                        <td>
                                            @if((string) $item->status == '1') <span class="label label-default">Bevestigd puntje</span>
                                            @elseif((string) $item->status == '0') <span class="label label-default">Nieuw puntje</span>
                                            @endif
                                        </td>
                                        {{-- /Status --}}

                                        <td>{{ $item->govMember->Name }}</td>
                                        <td><a href="{{ $item->media_url }}">{{substr($item->point, 0, 67) }}...</a></td>

                                        {{-- Functions --}}
                                        <td>
                                            {{-- Status functions --}}
                                            @if((string) $item->status == '0')
                                                <a href="{{ base_url('items/status/1/' . $item->id) }}" class="label label-success">Bevestigen</a>
                                            @elseif((string) $item->status == '1')
                                                <a href="{{ base_url('items/status/0/' . $item->id) }}" class="label label-success">Deactiveren</a>
                                            @endif
                                            {{-- /Status functions --}}

                                            <a class="label label-default" href="#">Bekijk</a>
                                            <a class="label label-danger" href="#">Verwijder</a>
                                        </td>
                                        {{-- /Functions --}}

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- /item table --}}

                        {{-- pagination --}}
                            {{ $links }}
                        {{-- /pagination --}}
                    </div>
                </div>
            @else
                <div class="alert alert-info" role="alert">
                    <strong>Info:</strong> ER zijn geen wansmakelijke puntjes gevonden.
                </div>
            @endif
        </div>
    </div>

    @include('items/create') {{-- Creation modal --}}
@endsection
