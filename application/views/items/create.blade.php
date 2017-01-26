{{-- Modal --}}
<div class="modal fade" id="newItem" role="dialog">
    <div class="modal-dialog">

        {{-- Modal content--}}
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Creeer een nieuw wansmakelijk puntje.</h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" action="{{ base_url('items/create') }}" method="post">
                    {{-- CSRF --}}
                    <input type="hidden" name="{{ $this->security->get_csrf_token_name() }}" value="{{ $this->security->get_csrf_hash() }}">

                    <div class="form-group">
                        <label for="politics" class="col-md-3 control-label">
                            Politici: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">
                            <select id="politics" class="form-control" name="sportsmen_id">
                                <option value="">-- Politici --</option>

                                @foreach(Sportsmen::all() as $human)
                                    <option value="{{ $human->id }}">{{ $human->Name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">
                            Puntje: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">
                            <input type="text" name="item_name" class="form-control" placeholder="Naam wansmakelijk puntje">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="media_url" class="col-md-3 control-label">
                            Media url: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">
                            <input type="text" name="media" class="form-control" placeholder="Media url.">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="control-label col-md-3">
                            Beschrijving: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">
                            <textarea name="description" rows="7" class="form-control" placeholder="Beschrijving"></textarea>
                        </div>
                    </div>


                {{-- The form closing is in the .model-footer --}}
            </div>

            <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-check"></span> Insturen</button>
                </form>
                <button type="submit" class="btn btn-default btn-sm" data-dismiss="modal"><span class="fa fa-close"></span> Cancel</button>
            </div>
        </div>
    </div>
</div>
