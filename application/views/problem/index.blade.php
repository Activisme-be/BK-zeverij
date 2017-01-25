@layout('layouts/front-end')

@section('content')
	<div class="row">
		<div class="col-md-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">Meld een probleem</div>

				<div class="panel-body">
					<form class="form-horizontal" method="POST" action="{{ base_url('problem/store') }}">
						 {{-- CSRF --}}
    					<input type="hidden" name="{{ $this->security->get_csrf_token_name() }}" value="{{ $this->security->get_csrf_hash() }}">

    					<div class="form-group">
    						<label class="control-label col-sm-3">
    							Titel probleem: <span class="text-danger">*</span>
    						</label>

    						<div class="col-sm-7">
    							<input type="text" name="title" class="form-control" placeholder="Titel probleem">
    						</div>
    					</div>

						<div class="form-group">
							<label class="control-label col-sm-3">
								Beschrijving: <span class="text-danger">*</span>
							</label>

							<div class="col-sm-9">
								<textarea rows="8" name="description" placeholder="Beschrijving van het probleem" class="form-control"></textarea>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-md-9">
								<button type="submit" class="btn btn-sm btn-success">
									<span class="fa fa-check" aria-hidden="true"></span> Insturen
								</button>

								<button type="reset" class="btn btn-sm btn-danger">
									<span class="fa fa-close" aria-hidden="true"></span> Reset
								</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

