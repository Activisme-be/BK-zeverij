@if (count($items) > 0)
    <table class="table table-condensed table-hover table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th colspan="2">Wansmakelijk puntje</th> {{-- Colspan="2" needed because this also covers the functions --}}
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td><code>#{{ $item->id }}</code></td>
                    <td>{{ $item->point }}</td>

                    <td> {{-- Functions --}}
                        <a class="label label-success" href="{{ base_url('items/vote/' . $human->id . '/' . $item->id ) }}">Stem</a>

                        @if (in_array('admin', $this->user['roles']))
                            <a class="label label-danger" href="">Verwijder</a>
                        @endif
                    </td> {{-- /Functions --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div class="alert alert-info">
        <strong>Info:</strong> {{ $human->Name }} heeft nog geen wansmakelijke punten vermeld in de media.
    </div>
@endif
