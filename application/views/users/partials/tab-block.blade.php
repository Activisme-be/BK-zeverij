<div class="panel panel-default">
    <div class="panel-body">
        {{-- Tab content --}}
        <form class="form-horizontal" method="POST" action="{{ base_url('users/block/' . $human->id) }}">
            <div class="form-group">
                <label class="control-label col-sm-2">User:</label>

                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" name="username" value="{{ $human->username}}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">
                    Reden: <span class="text-danger">*</span>
                </label>

                <div class="col-md-10">
                    <textarea name="reason" rows="7" class="form-control" placeholder="Reden to blokkering"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-sm btn-success">Blokkeer</button>
                    <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                </div>
            </div>
        </form>
        {{-- /Tab content --}}
    </div>
</div>
