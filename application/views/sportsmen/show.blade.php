@layout('layouts/front-end')

@section('content')
    <div class="row">
  	    <div class="col-sm-10"><h1>{{ $human->Name }}</h1></div>

    	<div class="col-sm-2">
            <a href="{{ $human->Information }}" class="pull-right">
                <img title="profile image" class="img-circle img-show img-thumbnail img-responsive" src="{{ base_url('assets/img/' . $human->photo) }}">
            </a>
        </div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->

          <ul class="list-group">
             <li class="list-group-item text-muted">Info:</li>
             <li class="list-group-item text-right"><span class="pull-left"><strong>Partij:</strong></span> <span class="label {{ $human->union->label}}">{{ $human->union->name_abbr}}</span></li>
             <li class="list-group-item text-right"><span class="pull-left"><strong>Punten:</strong></span> 0 Punten</li>
             <li class="list-group-item text-right">
                <span class="pull-left">
                    <strong>Info:</strong>
                </span>

                <a href="{{ $human->Information }}"> Overheid </a>
            </li>
          </ul>

          <div class="panel panel-primary">
              <div class="panel-heading">Functie beschrijving:</div>

              <div class="panel-body">
                  {{ $human->Function }}
              </div>
          </div>

          <div class="panel panel-primary">
            <div class="panel-heading">Sociale Media</div>
            <div class="panel-body">
            	<a href=""><i class="fa fa-facebook fa-2x"></i></a>
                <a href=""><i class="fa fa-twitter fa-2x"></i></a>
                <a href=""><i class="fa fa-envelope fa-2x"></i></a>
            </div>
          </div>

        </div><!--/col-3-->
    	<div class="col-sm-9">

          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#items" data-toggle="tab">Wansmaak items</a></li>
            <li><a href="#melding" data-toggle="tab">Meld een wansmakelijk punt</a></li>
          </ul>

          <div class="tab-content">
              <div class="tab-pane fade in active" id="items">

              </div><!--/table-resp-->

              <div class="tab-pane fade in active" id="melding">

              </div><!--/table-resp-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
@endsection
