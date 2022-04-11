<!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalLong">
    Take Interview
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Interview Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/candidate/interview')}}" method="post">
                @csrf
                <div class="modal-body">

                    <div class="row mt-2">
                        <div class="form-group col-md-4">
                            <label for="found_us" class="control-label mb-1">Found
                                us</label>
                            <input id="found_us" name="found_us" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" placeholder="Found us" value="{{old('found_us')}}">
                            <span class="text-danger"> {{ $errors->first('found_us') }}</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="car" class="control-label mb-1">Car</label>
                            <input id="car" name="car" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" placeholder="Car" value="{{old('car')}}">
                            <span class="text-danger"> {{ $errors->first('car') }}</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lives_in" class="control-label mb-1">Lives in</label>
                            <input id="lives_in" name="lives_in" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" placeholder="Lives in" value="{{old('lives_in')}}">
                            <span class="text-danger"> {{ $errors->first('lives_in') }}</span>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="form-group col-md-4">
                            <label for="lk" class="control-label mb-1">LK <small class="text-danger">*</small>
                            </label>
                            <input id="lk" name="lk" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" placeholder="LK" required="" value="{{old('lk')}}">
                            <span class="text-danger"> {{ $errors->first('lk') }}</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="present" class="control-label mb-1">Present <small
                                    class="text-danger">*</small></label>
                            <input id="present" name="present" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" placeholder="Present" required="" value="{{old('present')}}">
                            <span class="text-danger"> {{ $errors->first('present') }}</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="arrived_in_aus" class="control-label mb-1">Arrived in Aus<small
                                    class="text-danger">*</small></label>
                            <input id="arrived_in_aus" type="text" name="arrived_in_aus" class="form-control"
                                placeholder="Arrived in Aus" value="{{old('lk')}}">
                            <span class="text-danger"> {{ $errors->first('arrived_in_aus') }}</span>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="form-group col-md-4">
                            <label for="speaks" class="control-label mb-1">Speaks <small
                                    class="text-danger">*</small></label>
                            <input id="speaks" type="text" name="speaks" class="form-control" placeholder="Speaks"
                                value="{{old('speaks')}}">
                            <span class="text-danger"> {{ $errors->first('speaks') }}</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="computer_skill" class="control-label mb-1">Computer Skills <small
                                    class="text-danger">*</small></label>
                            <input id="computer_skill" type="text" name="computer_skill" class="form-control"
                                placeholder="Computer Skills" value="{{old('computer_skill')}}">
                            <span class="text-danger"> {{ $errors->first('computer_skill') }}</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="communication" class="control-label mb-1">Communication <small
                                    class="text-danger">*</small></label>
                                    <input id="communication" type="text" name="communication" class="form-control"
                                        placeholder="communication" value="{{old('communication')}}">
                                    <span class="text-danger"> {{ $errors->first('communication') }}</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="special_skills" class="control-label mb-1">Special Skills
                                <small class="text-danger">*</small></label>
                                <input id="special_skills" type="text" name="special_skills" class="form-control"
                                    placeholder="Special Skills" value="{{old('special_skills')}}">
                                <span class="text-danger"> {{ $errors->first('special_skills') }}</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="current_work" class="control-label mb-1">Current Work <small
                                    class="text-danger">*</small></label>
                                    <input id="current_work" type="text" name="current_work" class="form-control"
                                        placeholder="Current Work" value="{{old('current_work')}}">
                                    <span class="text-danger"> {{ $errors->first('current_work') }}</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="qualification" class="control-label mb-1">Qualification
                                <small class="text-danger">*</small></label>
                                <input id="qualification" type="text" name="qualification" class="form-control"
                                    placeholder="Qualification" value="{{old('qualification')}}">
                                <span class="text-danger"> {{ $errors->first('qualification') }}</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="expected_rate" class="control-label mb-1">Expected rate
                                <small class="text-danger">*</small></label>
                                <input id="expected_rate" type="text" name="expected_rate" class="form-control"
                                    placeholder="Expected rate" value="{{old('expected_rate')}}">
                                <span class="text-danger"> {{ $errors->first('expected_rate') }}</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="position_interested" class="control-label mb-1">Position interested
                                in <small class="text-danger">*</small></label>
                                <input id="position_interested" type="text" name="position_interested" class="form-control"
                                    placeholder="Position interested
                                    in" value="{{old('position_interested')}}">
                                <span class="text-danger"> {{ $errors->first('position_interested') }}</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="special_requirements" class="control-label mb-1">Special Requirement
                                s <small class="text-danger">*</small></label>
                                <input id="special_requirements" type="text" name="special_requirements" class="form-control"
                                    placeholder="Special Requirement
                                    s" value="{{old('special_requirements')}}">
                                <span class="text-danger"> {{ $errors->first('special_requirements') }}</span>
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-warning mr-3"><i class="ti-reload mr-1"></i> Reset</button>
                    <button type="submit" class="btn btn-info"><i class="ti-save-alt mr-1"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
