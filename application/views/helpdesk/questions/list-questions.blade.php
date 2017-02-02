@layout('layouts/front-end')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="fa fa-info-circle" aria-hidden="true"></span> Vragen:</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Categorie:</th>
                                <th>Vraag:</th>
                                <th colspan="2">Geopend op:</th> {{-- Colspan 2 needed because the functions are embedded. --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($questions as $question)
                                <tr>
                                    <td><code>#{{ $question->id }}</code></td>

                                    <td>
                                        @foreach($question->category as $tag)
                                            <span class="label label-primary"> {{ $tag->category }} </span>
                                        @endforeach
                                    </td>

                                    <td> {{ $question->title }} </td>
                                    <td> {{ $question->created_at }} </td>

                                    {{-- Functions --}}
                                        <td>
                                            <a href="#" class="label label-success">Bekijken</a>
                                            <a href="{{ base_url('questions/status/' . $question->id . '/0') }}" class="label label-danger">
                                                Sluiten
                                            </a>
                                        </td>
                                    {{-- /Functions --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
