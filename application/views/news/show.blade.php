@layout('layouts/front-end')

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<img class="img-rounded img-front" src="{{ base_url('assets/img/front.jpg') }}" alt="BK postjes pakken">
		</div>
	</div>

	<div style="padding-bottom: 30px;" class="row padding-top">
		{{-- Blog post --}}
			<div class="col-sm-9">
				{{-- Content --}}
					<div class="panel panel-default">
						<div class="panel-body">
							<h2 style="margin-bottom: -10px; margin-top: -5px;">{{ $article->heading }}</h2>
							<hr>

							{{ $this->cimarkdown->markit($article->message) }}
							<hr>

							<p style="margin-top: -10px;margin-bottom: -3px;">
								<i class="fa fa-user" aria-hidden="true"></i> Autheur: <a href="#">{{ $article->author->name }}</a> 
					          	| <i class="fa fa-calendar" aria-hidden="true"></i> {{ $article->created_at }}
					          	| <i class="fa fa-tags" aria-hidden="true"></i> Tags:

					          	@if ((int) count($article->categories) > 0)
					          		@foreach ($article->categories as $category)
					          			<a href="#"><span class="label label-info">{{ $category->category }}</span></a> 
					          		@endforeach
					          	@else 
					          		<span class="label label-primary">Geen</span>
					          	@endif
					          </p>

						</div>
					</div>

					@if ((int) count($comments) > 0)
						<hr>
					@endif
				{{-- /Content --}}

				{{-- Comments --}}
					{{-- Reactions --}}
						{{ $comments_link }}
							
						@foreach ($comments as $comment)
							<div class="well well-sm" style="margin-bottom:10px;">
								<div class="media">
	  								<div class="media-left">
	    								<a href="#">
	      									<img style="width: 64px; height:64px;" class=" img-rounded media-object" src="http://placehold.it/64x64" alt="...">
	    								</a>
	  								</div>
	  								
	  								<div class="media-body">
	    								<h4 class="media-heading">
	    									{{ $comment->creator->name }}<small> - {{ $comment->created_at }}</small> 
	    									<span class="pull-right">
	    										<small>
	    											<a onclick="edit('{{ base_url('comment/show/' . $comment->id) }}')">
	    												<small><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Rapporteer</small>
	    											</a>

	    											@if ($this->user['id'] === $comment->user_id) 
	    												<a href="{{ base_url('comment/delete/' . $comment->id) }}">
	    													<small><span class="fa fa-close"></span> Verwijder</small>
	    												</a>
	    											@endif 
	    										</small>
	    									</span>
	    								</h4>

	    								{{ $comment->comment }} 
	  								</div>
								</div>
							</div>
						@endforeach

						<hr>
					{{-- /Reactions --}}

					{{-- Comment box --}}
					<form class="form-horizontal" action="{{ base_url('comment/store/' . $article->id) }}" method="POST">
						<div class="form-group">
							<div class="col-md-12">
								<textarea class="form-control" rows="4" name="commentUser" placeholder="Uw reactie"></textarea>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-6">
								<button type="submit" class="btn btn-sm btn-success">Reageer</button>
								<button type="reset" class="btn btn-sm btn-danger">Reset</button>
							</div>
						</div>
					</form>
					{{-- /Comment box --}}
				{{-- /Comments --}}
			</div>
		{{-- /Blog post --}}

		{{-- Sidebar --}}
			<div class="col-sm-3">

				<div class="well well-sm">
	                <form method="POST" action="">
	                	{{-- CSRF --}}
                        <input type="hidden" name="{{ $this->security->get_csrf_token_name() }}" value="{{ $this->security->get_csrf_hash() }}">
                        
	                	<div class="input-group">
	                    	<input type="text" class="form-control" placeholder="Zoek bericht">
	                    	<span class="input-group-btn">
	                    		<button class="btn btn-success" type="button">
	                    			<i class="fa fa-search"></i>
	                     		</button>
	                    	</span>
	                	</div>
	                </form>
	            </div>

	            <div class="panel panel-default">
	            	<div class="panel-heading"><span class="fa fa-asterisk"></span> Categorieen:</div>
		    	
	            	<div class="panel-body">
	            		@foreach($categories as $category)
	            			<a href="" class="label label-primary">{{ $category->category }}</a>
	            		@endforeach
	            	</div>
		    	</div>

		    	{{-- Modal includes --}}
		    		@include('news/modals/modal-report')
		    	{{-- /Modal includes --}}
			</div>
		{{-- /Sidebar --}}
	</div>
@endsection
