<form class="form-horizontal" action="{{ base_url('category/store') }}" method="post">
    {{-- CSRF --}}
    <input type="hidden" name="{{ $this->security->get_csrf_token_name() }}" value="{{ $this->security->get_csrf_hash() }}">

    <input type="hidden" name="module" value="helpdesk">

     <div class="form-group">
         <label class="control-label col-sm-2">
             Naam: <span class="text-danger">*</span>
         </label>

         <div class="col-sm-4">
             <input name="category" placeholder="Naam categorie" class="form-control" type="text">
         </div>
     </div>

     <div class="form-group">
         <label class="control-label col-sm-2">
             Beschrijving: <span class="text-danger">*</span>
         </label>

         <div class="col-sm-8">
             <textarea name="description" placeholder="Categorie beschrijving" class="form-control" type="text" rows="7"></textarea>
         </div>
     </div>

     <div class="form-group">
         <div class="col-sm-offset-2 col-sm-8">
             <button type="submit" class="btn btn-sm btn-success">
                 <span class="fa fa-check" aria-hidden="true"></span> Aanmaken
             </button>

             <button type="reset" class="btn btn-sm btn-danger">
                 <span class="fa fa-close" aria-hidden="true"></span> Reset formulier
             </button>
         </div>
     </div>
</form>
