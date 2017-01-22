<div class="modal fade" id="newCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nieuwe categorie toevoegen.</h4>
            </div>
      
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ base_url('category/store') }}">
                {{-- </form> is not needed because it will be close in the .modal-footer class --}}

                <div class="form-group">
                    <label class="control-label col-sm-3">
                        Categorie: <span class="text-danger">*</span>
                    </label>

                    <div class="col-sm-9">
                        <input type="text" name="category" placeholder="Categorie naam" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">
                        Beschrijving: <span class="text-danger">*</span>
                    </label>

                    <div class="col-sm-9">
                        <textarea rows="8" placeholder="Categorie beschrijving" class="form-control" name="description"></textarea>
                    </div>
                </div>
            </div>
      
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary">Aanmaken</button>
                </form>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Sluiten</button>
            </div>
        </div>
    </div>
</div>
