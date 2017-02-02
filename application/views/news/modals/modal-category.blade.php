<div class="modal fade" id="newCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nieuwe categorie toevoegen.</h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ base_url('category/store') }}">
                    {{-- CSRF --}}
                    <input type="hidden" name="{{ $this->security->get_csrf_token_name() }}" value="{{ $this->security->get_csrf_hash() }}">

                    <input type="hidden" name="module" value="news">

                    <div class="form-group">
                        <label class="control-label col-sm-3">
                            Categorie: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">
                            <input type="text" v-model="coategoryInsert.category" name="category" placeholder="Categorie naam" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">
                            Beschrijving: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">
                            <textarea v-model="categoryInsert.description" rows="8" placeholder="Categorie beschrijving" class="form-control" name="description"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-md-9">
                            <button type="submit" class="btn btn-sm btn-primary" v-attr="disabled: errorsCategory">Aanmaken</button>
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Sluiten</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
