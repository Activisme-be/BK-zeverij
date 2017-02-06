@if((int) count($reports) > 0)
    {{-- Search box --}}
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="" class="form-inline pull-left">
                        {{-- CSRF --}}
                        <input type="hidden" name="{{ $this->security->get_csrf_token_name() }}" value="{{ $this->security->get_csrf_hash() }}">
                        <input @if ((int) count($news) === 0) disabled  @endif class="form-control" placeholder="Search term" name="term" />
                        <button type="submit" class="btn btn-danger" @if ((int) count($news) === 0) disabled  @endif>
                            <span class="glyphicon glyphicon-search"></span> Zoek
                        </button>
                    </form>
                </div>
            </div>
        </div>
    {{-- /Search box --}}

    {{-- Report listing --}}
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-hover table-condensed table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Gerapporteerd door:</th>
                                <th>Reactie:</th>
                                <th colspan="2">Gerapporteerd op:</th> {{-- Colspan needed because the functions. --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                @foreach ($report->reportReaction as $data)
                                    <tr>
                                        <td><code>#R{{ $data->id }}</code></td>
                                        <td>{{ $data->creator->name }}</td>
                                        <td>{{ substr($data->comment, 0, 30) . '...' }}</td>
                                        <td>{{ $data->created_at }}</td>

                                        <td> {{-- Functions --}}
                                            <a href="{{ base_url('report/close/' . $data->id) }}" class="label label-primary">Sluiten</a>
                                            <a href="" class="label label-info">Bekijk</a>
                                            <a href="" class="label label-danger">Verwijder</a>
                                        </td> {{-- /Functions --}}
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    {{-- /Report listing--}}
@else
    <div class="col-sm-12">
        <div class="alert alert-info" role="alert">
            <strong>Info:</strong> Er zijn geen reacties gerapporteerd
        </div>
    </div>
@endif
