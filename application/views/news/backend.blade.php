@layout('layouts/front-end')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-tabs">
	  			<li class="active"><a data-toggle="tab" href="#home">Nieuws berichten</a></li>
	  			<li><a data-toggle="tab" href="#menu1">Categorieen</a></li>
	  			<li><a data-toggle="tab" href="#menu2">Reactie rapporteringen</a></li>
	  			<li><a data-toggle="tab" href="#menu3">Nieuwsbericht toevoegen</a></li>
			</ul>
		</div>
	</div>

	<div class="row padding-top">
		<div class="tab-content">
  			<div id="home" class="tab-pane fade in active">
    			@include('news/partials/partial-articles')
  			</div>
  			
  			<div id="menu1" class="tab-pane fade">
  				<div class="container">
    				@include('news/partials/partial-categories')
    			</div>
  			</div>
  
  			<div id="menu2" class="tab-pane fade">
    			@include('news/partials/partial-reports')
  			</div>

  			<div id="menu3" class="tab-pane fade">
  				@include('news/partials/partial-create')
  			</div>
		</div>
	</div>

	{{-- Modal includes --}}
		@include('news/modals/modal-category')
	{{-- /Modal includes --}}
@endsection