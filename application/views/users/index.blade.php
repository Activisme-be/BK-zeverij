@layout('layouts/front-end')

@section('content')
    <div class="row">
        <div class="col-md-12">

            {{-- search form --}}
            <div class="pull-left">
                <form class="form-inline" action="{{ base_url('users/search') }}" method="GET">
                    <input type="text" name="term" placeholder="Zoekterm" class="form-control">
                    <button class="btn btn-danger">
                        <span class="fa fa-search"></span> Zoek
                    </button>
                </form>
            </div>
            {{-- /search form --}}

            {{-- Item creation  button --}}
            <div class="pull-right">
                <button type="button" data-toggle="modal" data-target="#newUser" class="btn btn-success">Gebruiker toevoegen</button>
            </div>
            {{-- /Item creation button --}}

        </div>
    </div>

    <div class="row padding-top">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-condensed table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Status</th>
                                <th>Username:</th>
                                <th>Naam:</th>
                                <th colspan="2">Email:</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                @if ($user->blocked === 'Y')
                                    <tr class="danger">
                                @else
                                    <tr>
                                @endif
                                    <td><code>#A{{ $user->id }}</code></td>

                                    <td> {{-- User status --}}
                                        @if ($user->blocked === 'N')
                                            <span class="label label-success">Actief</span>
                                        @elseif ($user->blocked === 'Y')
                                            <span class="label label-danger">Geblokkeerd</span>
                                        @else
                                            <span class="label label-info">Onbekend</span>
                                        @endif
                                    </td> {{-- /User status --}}

                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>

                                    <td> {{-- Functions --}}
                                        <a href="{{ base_url('users/handlings/' . $user->id) }}" class="label label-info">Bekijk</a>
                                        <a href="#" class="label label-warning">Rechten</a>
                                        <a href="{{ base_url('users/delete/' . $user->id) }}" class="label label-danger">Verwijder</a>

                                        @if ($user->blocked === 'Y')
                                            <a href="{{ base_url('users/unblock/' . $user->id) }}" class="label label-primary">Activeren</a> 
                                        @endif
                                    </td> {{-- /Functions --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Pagination --}}
                        {{ $links }}
                    {{-- /Pagination --}}
                </div>
            </div>

            {{-- Includes --}}
                {{-- TODO: Implement user creation model --}}
            {{-- /includes --}}
        </div>
    </div>
@endsection
