@if ((int) count($categories) === 0)
    <div class="alert alert-info" role="alert">
        <strong><span class="fa fa-info-circle"></span> Info:</strong>
        Er zijn geen categorieen gevonden voor de helpdesk in het systeem.
    </div>
@else
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Aangemaakt door:</th>
                <th>Categorie:</th>
                <th colspan="2">Vragen:</th> {{-- Colspan 2 is needed because the functions are embedded. --}}
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td><code>#C{{ $category->id }}</code></td>
                    <td>{{ $category->creator->name }}</td>
                    <td>{{ $category->category }}</td>
                    <td><span class="label label-primary">{{ count($category->question) }} Vragen </span></td>

                    {{-- Functions --}}
                        <td>
                            <a href="{{ base_url() }}" class="label label-success">Bekijken</a>
                            <a href="{{ base_url('category/destroy/', $category->id) }}" class="label label-danger">Verwijder</a>
                        </td>
                    {{-- /Functions --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
