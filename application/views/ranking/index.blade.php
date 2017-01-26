@layout('layouts/front-end')

@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#invidueel" aria-controls="home" role="tab" data-toggle="tab">Invidueel klassement</a>
                </li>

                {{--
                <li role="presentation">
                    <a href="#ploegen" aria-controls="profile" role="tab" data-toggle="tab">Ploegen klassement</a>
                </li>
                --}}
            </ul>

            <div class="tab-content padding-top">

                {{-- --}}
                <div role="tabpanel" class="tab-pane fade in active" id="invidueel">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ploeg:</th>
                                        <th>Persoon:</th>
                                        <th>Punten:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($humans as $human)
                                        <tr>
                                            <td><strong>{{ $position++ }}</strong></td>
                                            <td><span class="label {{ $human->union->label }}">{{ $human->union->name_abbr }}</span></td>
                                            <td><a href="{{ base_url('participants/show/' . $human->id) }}">{{ $human->Name }}</a></td>
                                            <td>{{ $human->points_count; }} punten</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{--
                <div role="tabpanel" class="tab-pane fade in" id="ploegen">
                    <div class="panel panel-default">

                    </div>
                </div>
                --}}

            </div>
        </div>
    </div>
@endsection
