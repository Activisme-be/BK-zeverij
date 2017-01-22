@if ((int) count($news) > 0)
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-body">
				{{-- TODO: Implement the search feture --}}
			</div>
		</div>
	</div>
@endif

<div class="col-sm-12">
	@if ((int) count($news) === 0)
		<div class="alert alert-info">
			<strong>Info:</strong> Er zijn geen nieuwsberichten gevonden.
		</div>
	@else 
		<div class="panel panel-default">
			<div class="panel-body">
				<table class="table table-condensed table-hover table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Auteur:</th>
							<th>Nieuwsbericht</th>
							<th colspan="2">Toegevoegd op:</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($news as $article)
							<tr>
								<td> <code>#A{{ $article->id }}</code></td>
								<td> {{ $article->author->name }}</td>
								<td> {{ $article->heading }}</td>
								<td> {{ $article->created_at }}</td>
								
								<td> {{-- Functions --}}
									<a href="" class="label label-info">Bekijk</a>
									<a href="{{ base_url('news/delete/' . $article->id) }}" class="label label-danger">Verwijder</a>
								</td> {{-- /Functions --}}
							
							</tr>
						@endforeach
					</tbody>
				</table>	
			</div>
		</div>
	@endif
</div>
