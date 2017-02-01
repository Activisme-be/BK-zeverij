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
                <th colspan="2">Categorie:</th> {{-- Colspan 2 is needed because the functions are embedded. --}}
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>

                    {{-- Functions --}}
                    {{-- /Functions --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
