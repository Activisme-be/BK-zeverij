@layout('layouts/front-end')

@section('content')
    <div class="row">

        {{-- Tab menu --}}
            <div class="col-sm-12">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#question" aria-controls="home" role="tab" data-toggle="tab">Vragen</a></li>
                    <li role="presentation"><a href="#categories" aria-controles="catgeories" role="tab" data-toggle="tab">Categorieén</a></li>
                    <li role="presentation"><a href="#newCategory" aria-controls="newCategory" role="tab" data-toggle="tab">Categorie toevoegen</a></li>
                </ul>
            </div>
        {{-- /Tab menu --}}

    </div>

    {{-- --}}
        <div class="padding-top row">
            <div class="col-sm-12">
                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane fade in active" id="question">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                @include('helpdesk/questions/tabs/questions')
                            </div>
                        </div>
                    </div>


                    <div role="tabpanel" class="tab-pane fade in" id="categories">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                @include('helpdesk/questions/tabs/category')
                            </div>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane fade in" id="newCategory">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                @include('helpdesk/questions/tabs/new-category')
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    {{-- --}}
@endsection
