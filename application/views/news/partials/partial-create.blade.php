<div class="col-sm-12">
	<div class="panel panel-default">
		<div class="panel-body">
			<form method="POST" action="{{ base_url('news/store') }}" class="form-horizontal">

				<div class="form-group">
					<label class="control-label col-sm-2">
						Titel: <span class="text-danger">*</span>
					</label>

					<div class="col-sm-5">
						<input type="text" class="form-control" placeholder="Bericht titel" name="heading">
					</div>
				</div>
			
				<div class="form-group">
					<label class="control-label col-sm-2">
						Categorieen: <span class="text-danger">*</span>
					</label>

					<div class=" col-sm-5">
						<select name="category[]" class="form-control" multiple>
							@if ((int) count($categories) === 0) 
								<option value="">Er zijn geen categorieen gevonden</option>
							@else 
								@foreach($categories as $item)
									<option value="{{ $item->id }}">{{ $item->category }}</option>
								@endforeach
							@endif
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">
						Nieuwsbericht: <span class="text-danger">*</span>
					</label>

					<div class="col-sm-10">
						<textarea rows="8" placeholder="Het nieuwsbericht" name="description" class="form-control"></textarea>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success">Aanmaken</button>
						<button type="reset" class="btn btn-danger">Reset</button>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>
