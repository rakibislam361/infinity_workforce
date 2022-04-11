<div class="modal fade" id="basic_edit" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title pull-left" id="largeModalLabel">{{$content->name}}</h5>
                <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/page/update',$content->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                   <div class="row">
                       <div class="col-md-12">
                           <label>Page Content</label>
                           <textarea class="form-control" id="summernote" name="content" style="height: 350px;">{{@$content->desc}}</textarea>
                          
                       </div>
                        <div class="clearfix"></div>
                        @if($content->id !=1)
                        <div class="col-md-6 mt-3">
                             <label>Image</label>
                            <input type="file" name="image" accept="image/jpg,image/png,image/jpeg,image/bmp">
                        </div>
                        @endif
                        <div class="col-md-6 mt-3">
                            <label>Status</label>
                            <br/>
                            <label class="switch switch-green status">
                              <input type="checkbox" class="switch-input" {{@$content->status==1 ? 'checked' : '' }} value="1" name="status">
                              <span class="switch-label" data-on="On" data-off="Off"></span>
                              <span class="switch-handle"></span>
                            </label>
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
<div class="modal fade" id="seo_edit" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title pull-left" id="largeModalLabel">{{$content->name}} SEO</h5>
                <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/page/update',$content->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                   <div class="row">
                        <div class="col-md-12">
                           <label>Keywords <small class="text-info">Separate With Comma</small></label>
                          <input type="text" name="keywords" value="{{@$content->keywords}}" class="form-control">
                       </div>
                       
                       <div class="col-md-12 mt-2">
                           <label>Meta Description</label>
                           <textarea class="form-control"  name="content" style="height: 150px;">{{@$content->meta_desc}}</textarea>
                       </div>
                        <div class="col-md-6 mt-2">
                           <label>OG URL</label>
                          <input type="text" name="og_url" value="{{@$content->og_url}}" class="form-control">
                       </div>
                        <div class="col-md-6 mt-2">
                             <label>OG Image</label>
                            <input type="file" name="og_image" accept="image/jpg,image/png,image/jpeg,image/bmp">
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