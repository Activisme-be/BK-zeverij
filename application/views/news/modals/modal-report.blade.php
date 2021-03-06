{{-- Report reaction modal --}}
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title" id="myModalLabel">Rapporteer een reactie.</h4>
            </div>

            <div class="modal-body form">
                <form action="{{  base_url('comment/report')  }}" id="form" method="POST" class="form-horizontal">
                    {{-- CSRF --}}
                    <input type="hidden" name="{{ $this->security->get_csrf_token_name() }}" value="{{ $this->security->get_csrf_hash() }}">

                    <input type="hidden" value="" name="id"/>

                    <div class="form-body">

                        {{-- Reaction content input-group. --}}
                        <div class="form-group">
                            <label class="control-label col-sm-2">Reactie: </label>

                            <div class="col-sm-10">
                                <textarea name="comment" disabled rows="5" class="form-control"></textarea>
                            </div>
                        </div>

                        {{-- Reason reaction input --}}
                        <div class="form-group">
                            <label class="control-label col-sm-2">
                                Rede: <span class="text-danger">*</span>
                            </label>

                            <div class="col-sm-10">
                                <textarea rows="5" placeholder="Reden tot rapporteering" class="form-control" name="reason"></textarea>
                            </div>
                        </div>

                        {{-- Submit and reset group  --}}
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <button type="submit" class="btn btn-sm btn-success">Rapporteer</button>
                                <button type="reset" class="btn btn-sm btn-danger" data-dismiss="modal">Annuleer</button>
                            </div>
                        </div>
                    
                    </div>

                </form>
            </div>

        </div>{{-- /.modal-content --}}
    </div>{{-- /.modal-dialog --}}
</div>{{-- /.modal --}}
<!-- /Report reaction modal -->
