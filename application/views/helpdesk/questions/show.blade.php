@layout('layouts/front-end')

@section('content')
    <div class="row">
        <div class="col-sm-8">
            <div class="panel panel-default"> {{-- Question details --}}
                <div class="panel-heading">
                    Vraag: {{ $question->title }}

                    <span class="pull-right">
                        @foreach ($question->category as $category)
                            <span class="label label-primary">{{ $category->category }}</span>
                        @endforeach
                    </span>
                </div>

                <div class="panel-body">
                    {{ $question->description }}
                </div>
            </div> {{-- /Question details --}}

            <hr> {{-- Break the question view from the comment section. --}}

            <form class="form-hoirzontal" method="POST" action="">
                <div class="form-group">
                </div>
            </form>
        </div>

        <div class="col-sm-4">

            <div class="panel panel-default">
                <div class="panel-heading">Informatie:</div>

                <ul class="list-group">
                    <li class="list-group-item">
                        <strong>Aangemaakt op:</strong>
                        <span class="pull-right">{{ $question->created_at }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Laatst aangepast:</strong>
                        <span class="pull-right">{{ $question->updated_at }}</span>
                    </li>
                </ul>
            </div>

            <div class="list-group">
                <a href="{{ base_url() }}" class="list-group-item list-group-item-warning">
                    <span class="fa fa-btn fa-github" aria-hidden="true"></span> Exporteer naar github.
                </a>

                <a href="{{ base_url() }}" class="list-group-item list-group-item-danger">
                    <span class="fa fa-close fa-btn" aria-hidden="true"></span> Deze vraag sluiten
                </a>
            </div>

        </div>
    </div>
@endsection
