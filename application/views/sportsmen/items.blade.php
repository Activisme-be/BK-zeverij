@if (count($human->items) > 0)
    <table class="table table-condensed table-hover table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th colspan="2">Wansmakelijk puntje</th> {{-- Colspan="2" needed because this also covers the functions --}}
            </tr>
        </thead>
        <tbody>
            @foreach($human->items as $item)
                <tr>
                    <td><code>#{{ $item->id }}</code></td>
                    <td>{{ $item->point }}</td>

                    <td> {{-- Functions --}}
                        {{-- (!is_null($point->user_votes()->find($user_id))) --}}
                        @if (! is_null($item->usersWhoVoted()->find($this->user['id'])))
                            <span class="label label-info">Al gestemd</span>
                        @else
                            <a class="label label-success" href="{{ base_url('items/vote/' . $human->id . '/' . $item->id ) }}">Stem</a>
                        @endif

                        @if (in_array('admin', $this->user['roles']))
                            <a class="label label-danger" href="">Verwijder</a>
                        @endif
                    </td> {{-- /Functions --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div class="alert alert-info" role="alert">
        <strong>Info:</strong> {{ $human->Name }} heeft nog geen wansmakelijke punten vermeld in de media.
    </div>
@endif
