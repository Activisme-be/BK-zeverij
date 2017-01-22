@layout('layouts/front-end')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <img class="img-rounded img-front" src="{{ base_url('assets/img/front.jpg') }}" alt="BK postjes pakken">
        </div>
    </div>

    <div style="padding-bottom: 30px;" class="padding-top row">
    	<div class="col-md-9">
    		
    		{{-- News items --}}
    			@foreach($news as $article)
    				<div style="margin-left: -15px;" class="col-sm-12">
		    			<div class="row">
			    			<div class="col-md-8">
			    				<h4><strong><a href="#">{{ $article->heading }}</a></strong></h4>
			   				</div>
		   				</div>
		    			
			    		<div class="row">
			      			<div class="col-md-3">
			        			<a href="#" class="thumbnail">
			           				<img src="http://placehold.it/260x180" alt="">
			        			</a>
			      			</div>
			      
			     			<div class="col-md-9">      
			        			<p>{{ strip_tags($this->cimarkdown->markit($article->message)) }}</p>
			        			<p><a class="btn btn-sm btn-info" href="#">Lees meer...</a></p>
			     			</div>
			    		</div>
		    
			    		<div class="row">
			      			<div class="col-md-12" style="margin-top: -20px;">
				        		<p></p>
				        
				        		<p>
				          			<i class="icon-user"></i> Autheur: <a href="#">{{ $article->author->name }}</a> 
				          			| <i class="fa fa-calendar" aria-hidden="true"></i> {{ $article->created_at }}
				          			| <i class="fa fa-comment" aria-hidden="true"></i> <a href="#">{{ count($article->comments) }} Reacties</a>
				          			| <i class="fa fa-tags" aria-hidden="true"></i> Tags:

				          			@if ((int) count($article->categories) > 0)
				          				@foreach($article->categories as $category)
				          					<a href="#"><span class="label label-info">{{ $category->category }}</span></a> 
				          				@endforeach
				          			@else 
				          				<span class="label label-primary">Geen</span>
				          			@endif
				          
				        		</p>
				      		</div>
			    		</div>
			    	</div>
    			@endforeach
    		{{-- /News Items --}}

	    	<div style="margin-left: -15px;" class="col-sm-12">
	    		{{-- Pagination --}}
	    			{{ $links }}
	    		{{-- /Pagination --}}
	    	</div>
	    </div>

	    <div class="col-sm-3">

	    	<div class="well well-sm" style="margin-top: 10px;">
                <form method="POST" action="">
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

	    </div>
    </div>
@endsection
