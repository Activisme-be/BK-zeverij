<div id="resetPass" class="modal fade" role="dialog">
    <div class="modal-dialog">

        {{-- Modal content--}}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reset wachtwoord</h4>
            </div>
            <div class="modal-body">
                <form method="POST" class="form-horizontal" action="{{ base_url('auth/reset') }}">
                    {{-- CSRF --}}
                    <input type="hidden" name="{{ $this->security->get_csrf_token_name() }}" value="{{ $this->security->get_csrf_hash() }}">

                    <div class="form-group">
                        <label for="email" class="control-label col-sm-2">
                            Email: <span class="text-danger">*</span>
                        </label>

                        <div class="col-md-10">
                            <input type="text" name="email" class="form-control" id="email" placeholder="Email adres">
                        </div>
                    </div>

                {{-- Closing form element not needed because it is in the modal-footer class --}}
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-check"></span> Resetten</button>
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><span class="fa fa-close"> Close</button>
            </div>
        </div>

    </div>
</div>
