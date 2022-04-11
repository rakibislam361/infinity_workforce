 <div class="modal fade" id="edit_assigned_candidates" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">{{@$employer->employer_info->company_name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                @csrf
            <div class="modal-body">
                <div class="row">
                   <div class="form-group col-md-6">
                        <label for="name" class="control-label mb-1">Title<small class="text-danger">*</small></label>
                        <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Title" required="" value="">
                         <span class="text-danger"> {{ $errors->first('name') }}</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>