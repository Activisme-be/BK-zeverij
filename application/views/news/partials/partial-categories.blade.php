<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form method="POST" action="{{ base_url('category/search') }}" class="form-inline pull-left"> 
            		<input @if ((int) count($categories) === 0) disabled  @endif class="form-control" placeholder="Search term" name="term" />
                	<button type="submit" class="btn btn-danger" @if ((int) count($categories) === 0) disabled  @endif>
                    	<span class="glyphicon glyphicon-search"></span> Zoek
                	</button>
        		</form>

        		<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#newCategory">Nieuwe categorie toevoegen</button>
			</div>
		</div> 
	</div>

	<div class="col-md-12">
		@if ((int) count($categories) === 0)
			<div class="alert alert-info" role="alert">
				<strong>Info:</strong> Er zijn geen categorieen voor de nieuwsberichten gevonden.
			</div>
		@else
			<div class="panel panel-default">
				<div class="panel-body">
					{{-- Category table  --}}
						<table class="table table-hover table-condensed">
							<thead>
								<tr>
									<th>#</th>								{{-- The ID in the database  --}}
									<th>Categorie:</th>						{{-- Category nam$e --}}
									<th>Beschrijving:</th>					{{-- Category beschrijvin --}}
									<th colspan="2">Aangemaakt op:</th>		{{-- Created at in the database --}}
								</tr>
							</thead>
							<tbody>
								@foreach($categories as $category)
									<tr>
										<td> <code>#C{{ $category->id }} </code></td>
										<td> {{ $category->category }} </td>
										<td> {{ $category->description }} </td>
										<td> {{ $category->created_at }} </td>

										{{--  Functions --}}
										<td>
											<a class="label label-danger" href="{{ base_url('category/delete/' . $category->id) }}">Verwijder</a>
										</td>
 										{{--  /Functions --}}
									</tr>
								@endforeach
							</tbody>
						</table>
					{{-- /Category table  --}}
				</div>
			</div>
		@endif
	</div>
</div>
