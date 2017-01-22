@layout('layouts/front-end')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <img class="img-rounded img-front" src="{{ base_url('assets/img/front.jpg') }}" alt="BK postjes pakken">
        </div>
    </div>

    <div style="padding-bottom: 30px;" class="padding-top row">
    	<div class="col-md-9">
    		<div style="margin-left: -15px;" class="col-sm-12">
    			<div class="row">
	    			<div class="col-md-8">
	    				<h4><strong><a href="#">Title of the post</a></strong></h4>
	   				</div>
   				</div>
    			
	    		<div class="row">
	      			<div class="col-md-3">
	        			<a href="#" class="thumbnail">
	           				<img src="http://placehold.it/260x180" alt="">
	        			</a>
	      			</div>
	      
	     			<div class="col-md-9">      
	        			<p>
	          				Lorem ipsum dolor sit amet, id nec conceptam conclusionemque. 
	          				Et eam tation option. Utinam salutatus ex eum. Ne mea dicit tibique facilisi, ea mei omittam explicari conclusionemque, ad nobis propriae quaerendum sea.
	        			</p>
	        
	        			<p><a class="btn btn-sm btn-info" href="#">Read more</a></p>
	     			</div>
	    		</div>
    
	    		<div class="row">
	      			<div class="col-md-12" style="margin-top: -20px;">
		        		<p></p>
		        
		        		<p>
		          			<i class="icon-user"></i> by <a href="#">John</a> 
		          			| <i class="icon-calendar"></i> Sept 16th, 2012
		          			| <i class="icon-comment"></i> <a href="#">3 Comments</a>
		          			| <i class="icon-tags"></i> Tags : <a href="#"><span class="label label-info">Snipp</span></a> 
		          
		          			<a href="#"><span class="label label-info">Bootstrap</span></a> 
		          			<a href="#"><span class="label label-info">UI</span></a> 
		          			<a href="#"><span class="label label-info">growth</span></a>
		        		</p>
		      		</div>
	    		</div>
	    	</div>

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
