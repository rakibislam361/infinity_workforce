<form action="{{ route('admin-user-update', $user->id) }}" method="post" enctype="multipart/form-data"
    class="new-user">
    @csrf
    <h4>Applicant Number is <strong>IDN{{ $user->id }}</strong> </h4><br />
    {{-- @if ($errors->any())
            {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif --}}
    <div class="row mt-2">
        <div class="form-group col-md-4">
            <label for="first-name" class="control-label mb-1">First Name <small class="text-danger">*</small></label>
            <input id="first-name" name="first_name" type="text" class="form-control" aria-required="true"
                aria-invalid="false" placeholder="First Name" required=""
                value="@if (@$user->info->first_name) {{ @$user->info->first_name }}@else{{ old('first_name') }} @endif">
            <span class="text-danger"> {{ $errors->first('first_name') }}</span>
        </div>

        <div class="form-group col-md-4">
            <label for="last_name" class="control-label mb-1">Last Name <small class="text-danger">*</small></label>
            <input id="last_name" name="last_name" type="text" class="form-control" aria-required="true"
                aria-invalid="false" placeholder="Last Name"
                value="@if (@$user->info->last_name) {{ @$user->info->last_name }}@else{{ old('last_name') }} @endif"
                required="">
            <span class="text-danger"> {{ $errors->first('last_name') }}</span>
        </div>
        <div class="form-group col-md-4">
            <label for="middle_name" class="control-label mb-1">Nickname </label>
            <input id="middle_name" name="middle_name" type="text" class="form-control" placeholder="Nickname"
                value="@if (@$user->info->mid_name) {{ @$user->info->mid_name }}@else{{ old('middle_name') }} @endif">
            <span class="text-danger"> {{ $errors->first('middle_name') }}</span>
        </div>
        <div class="form-group col-md-4">
            <label for="last-name" class="control-label mb-1">Gender <small class="text-danger">*</small></label>
            <select name="gender" class="form-control" required="">

                <option value="0" @if (@$user->info->gender == 0 || old('gender') == 0) selected @endif>Select Gender</option>
                <option value="1" @if (@$user->info->gender == 1 || old('gender') == 1) selected @endif>Male</option>
                <option value="2" @if (@$user->info->gender == 2 || old('gender') == 2) selected @endif>Female</option>
                <option value="3" @if (@$user->info->gender == 3 || old('gender') == 3) selected @endif>Other</option>
            </select>
            <span class="text-danger"> {{ $errors->first('gender') }}</span>
        </div>
        <div class="form-group col-md-4">
            <label for="email" class="control-label mb-1">Email <small class="text-danger">*</small> </label>
            <input id="email" name="email" type="email" class="form-control" aria-required="true" aria-invalid="false"
                placeholder="Email" required="" value="{{ $user->email }}">
            <span class="text-danger"> {{ $errors->first('email') }}</span>
        </div>
        <div class="form-group col-md-4">
            <label for="role" class="control-label mb-1">Role <small class="text-danger">*</small> </label>
            <select name="role" class="form-control">
                <option value="">Select Role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" @if ($role->id == @$user->role_id || old('role') == $role->id) selected @endif>
                        {{ $role->name }}</option>
                @endforeach
            </select>
            <span class="text-danger"> {{ $errors->first('role') }}</span>
        </div>
        {{-- <div class="form-group col-md-4">
            <label for="password" class="control-label mb-1">Password </label>
            <input id="password" name="password" type="password" class="form-control"  placeholder="Password" value="">
            <span class="text-danger"> {{ $errors->first('password') }}</span>
        </div> --}}

    </div>
    <div class="row mt-2">
        <div class="form-group col-md-4">
            <label for="dob" class="control-label mb-1">Date of birth <small class="text-danger">*</small></label>
            <input id="dob" name="dob" type="date" class="form-control" placeholder="dob"
                value="{{ $user->info->dob ? date('Y-m-d', strtotime(@$user->info->dob)) : '' }}" required="">
            <span class="text-danger"> {{ $errors->first('dob') }}</span>
        </div>
        <div class="form-group col-md-8">
            <label for="current_address" class="control-label mb-1">Current Address <small
                    class="text-danger">*</small></label>
            <input id="current_address" name="current_address" type="text" class="form-control" placeholder="Address"
                value="@if (@$user->info->address) {{ @$user->info->address }}@else{{ old('current_address') }} @endif"
                required="">
            <span class="text-danger"> {{ $errors->first('current_address') }}</span>
        </div>

    </div>
    <div class="row mt-2">
        <div class="form-group col-md-4">
            <label for="town_city" class="control-label mb-1">Town/City <small class="text-danger">*</small></label>
            <input id="town_city" name="town_city" type="text" class="form-control" placeholder="Town/City"
                value="@if (@$user->info->town_city) {{ @$user->info->town_city }}@else{{ old('town_city') }} @endif"
                required="">
            <span class="text-danger"> {{ $errors->first('town_city') }}</span>
        </div>
        <div class="form-group col-md-4">
            <label for="postcode" class="control-label mb-1">Postcode <small class="text-danger">*</small></label>
            <input id="postcode" name="postcode" type="text" class="form-control" placeholder="Postcode"
                value="{{ @$user->info->postcode }}" required="">
            <span class="text-danger"> {{ $errors->first('postcode') }}</span>
        </div>
        <div class="form-group col-md-4">
            <label for="country" class="control-label mb-1">Country <small class="text-danger">*</small></label>
            <select name="country" id="country" class="form-control" required="">
                <option value="">Select Country</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" @if ($country->id == @$user->info->country_id || $country->id == old('country')) selected @endif>
                        {{ @$country->name }}</option>
                @endforeach
            </select>
            <span class="text-danger"> {{ $errors->first('country') }}</span>
        </div>
        <div class="form-group col-md-6">
            <label for="calling_code" class="control-label mb-1">Emergency Contact Number <small
                    class="text-danger">*</small></label>
            <div class="row">
                <div class="col-md-4">
                    <select name="calling_code" id="calling_code" class="form-control" required="">
                        <option value="">Select Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" @if (@$country->id == @$user->info->calling_code || $country->id == old('calling_code')) selected @endif>
                                {{ @$country->name }} ({{ @$country->calling_code }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-8">

                    <input id="phone" name="phone" type="text" class="form-control" aria-required="true"
                        aria-invalid="false" placeholder="Phone"
                        value="@if (@$user->info->phone) {{ @$user->info->phone }}@else{{ old('phone') }} @endif"
                        required="">
                    <span class="text-danger"> {{ $errors->first('phone') }}</span>
                </div>

            </div>
            <span class="text-danger"> {{ $errors->first('phone') }}</span>
        </div>


        <div class="form-group col-md-4">
            <label for="image" class="control-label mb-1">Recent Photo</label>
            <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false"
                placeholder="" value="{{ old('image') }}" accept="image/png, image/jpeg,image/jpg,image/bmp">
            <span class="text-danger"> {{ $errors->first('image') }}</span>
        </div>
        <div class="form-group col-md-4">
            @if ($user->image)
                <img src="{{ asset('images/users') }}/{{ $user->image }}" width="150" class="img-responsive img">
            @else
                <p class="mt-4"><i class="fa fa-warning text-warning"></i> No Profile Photo Found</p>
            @endif
        </div>

    </div>

    {{-- <div class="row">
        <div class="col-md-12 mb-3">
            <strong>CHOOSE BETWEEN THE FOLLOWING OPTION BELOW: <small class="text-danger">*</small></strong>

        </div>
        <div class="col-md-12">
            <label class="control-label mb-2">
                <input type="radio" name="purpose" value="1" @if (@$user->info->purpose == 1 || old('purpose') == 1) checked @endif
                    required="">
                I do currently hold an AUSTRALIAN Visa or Citizenship AND
                I'm looking for a WORK in AUSTRALIA
            </label>
            <label class="control-label mb-2">
                <input type="radio" name="purpose" value="2" @if (@$user->info->purpose == 2 || old('purpose') == 2) checked @endif>
                "I do currently hold an AUSTRALIAN Visa or Citizenship AND
                I'm looking for an UNIVERSITY to STUDY in AUSTRALIA"
            </label>
            <label class="control-label mb-2">
                <input type="radio" name="purpose" value="3" @if (@$user->info->purpose == 3 || old('purpose') == 3) checked @endif>
                "I do currently hold an AUSTRALIAN Visa or Citizenship AND
                I'm looking for an INTERNSHIP OR TRAINING in AUSTRALIA"
            </label>
            <label class="control-label mb-2">
                <input type="radio" name="purpose" value="4" @if (@$user->info->purpose == 4 || old('purpose') == 4) checked @endif>
                "Currently I do NOT hold an AUSTRALIAN Visa or Citizenship, BUT
                I'm looking for an AUSTRALIAN VISA and would like to STUDY or WORK in AUSTRALIA"
            </label>
            <label class="control-label mb-2">
                <input type="radio" name="purpose" value="5" @if (@$user->info->purpose == 5 || old('purpose') == 5) checked @endif>
                "I do currently hold an AUSTRALIAN Visa or Citizenship AND
                I'm looking for DISABILITY EMPLOYMENT SERVICES in AUSTRALIA"
            </label>
        </div>

    </div> --}}

    <div class="row mt-5">
        <div class="col-md-6 col-lg-6">
            <label class="control-label mb-1">What is your current AUSTRALIAN Visa or Citizenship? <small
                    class="text-danger">*</small></label>
            <select name="visa" class="form-control" required id="visa" onchange="select_visa()">
                <option value="" @if (@$user->info->visa == 0 || old('visa') == 0) selected @endif>Select Visa</option>
                <option value="1" @if (@$user->info->visa == 1 || old('visa') == 1) selected @endif>Citizen</option>
                <option value="6" @if (@$user->info->visa == 6 || old('visa') == 6) selected @endif>Student Visa</option>
                <option value="10" @if (@$user->info->visa == 10 || old('visa') == 10) selected @endif>PR visa</option>
                <option value="11" @if (@$user->info->visa == 11 || old('visa') == 11) selected @endif>Work Holiday Visa</option>
                <option value="12" @if (@$user->info->visa == 12 || old('visa') == 12) selected @endif>Protection visa</option>
                <option value="13" @if (@$user->info->visa == 13 || old('visa') == 13) selected @endif>TR (Post Study Work)</option>
                <option value="5" @if (@$user->info->visa == 14 || old('visa') == 5) selected @endif>Temporary Resident Visa</option>
                <option value="7" @if (@$user->info->visa == 16 || old('visa') == 7) selected @endif>Work Visa</option>
            </select>
            <span class="text-danger"> {{ $errors->first('visa') }}</span>
        </div>
        <div class="col-lg-6 col-md-6 @if (@$user->info->visa == 1 || old('visa') == 1 || @$user->info->visa == 2 || old('visa') == 2) {{ 'd-none' }} @endif"
            id="hiddenVisaExp">
            <label class="control-label mb-1">When does your current visa expire?</label>
            <input type="text" name="visa_exp" class="form-control visa_exp date" placeholder="DD-MM-YYYY"
                value="@if (@$user->info->visa_exp) {{ @$user->info->visa_exp }}@else{{ old('visa_exp') }} @endif">
            <span class="text-danger"> {{ $errors->first('visa_exp') }}</span>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <label>How many hours are you ELIGIBLE to work in AUSTRALIA?</label>
            <input type="number" name="work_per_week" placeholder="8" class="form-control"
                value="@if (old('work_per_week')) {{ old('work_per_week') }}@else{{ @$user->info->work_per_week }} @endif">
            <span class="text-danger"> {{ $errors->first('work_per_week') }}</span>
        </div>
        <div class="col-md-6">
            <label>How do you usually travel in AUSTRALIA?</label>
            <select class="form-control" name="travel_to_work">
                <option value="Car" @if (@$user->info->travel_to_work = 'Car') selected @endif>Car</option>
                <option value="Public transport" @if (@$user->info->travel_to_work = 'Public transport' || (old('travel_to_work') = 'Public transport')) selected @endif>Public transport
                </option>
                <option value="Scooter/bike" @if (@$user->info->travel_to_work = 'Scooter/bike' || (old('travel_to_work') = 'Scooter/bike')) selected @endif>Scooter/bike</option>
            </select>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <label>Medical check completed</label>
            <input type="text" name="medical_check" placeholder="DD-MM-YYYY" class="form-control medical_check"
                value="@if (old('medical_check')) {{ old('medical_check') }}@else{{ @$user->info->medical_check_date }} @endif">
            <span class="text-danger"> {{ $errors->first('medical_check') }}</span>
        </div>
        <div class="col-md-6">
            <label>Police check completed</label>
            <input type="text" name="police_check" placeholder="DD-MM-YYYY" class="form-control police_check"
                value="@if (old('police_check')) {{ old('police_check') }}@else{{ @$user->info->police_check_date }} @endif">
            <span class="text-danger"> {{ $errors->first('police_check') }}</span>
        </div>
    </div>
    <div class="row form-group mt-2">


        <div class="col-md-6 mt-3">
            <a class="btn btn-info btn-sm" data-toggle="collapse" href="#collapseExample" role="button"
                aria-expanded="false" aria-controls="collapseExample">
                Change password
            </a>
            <div class="collapse" id="collapseExample">
                <label for="password" class="control-label mb-1">Password</label>
                <input id="password" name="password" type="password" class="form-control" aria-required="true"
                    aria-invalid="false" placeholder="Password">
                <span class="text-danger"> {{ $errors->first('password') }}</span>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-right mt-3">
            <button type="reset" class="btn btn-warning mr-3"><i class="ti-reload mr-1"></i> Reset</button>
            <button type="submit" class="btn btn-info"><i class="ti-save-alt mr-1"></i> Update</button>
        </div>
    </div>

</form>
@push('footer')
    {{-- visa onchange --}}
    <script type="text/javascript">
        function select_visa() {
            var x = document.getElementById("visa").value;

            if (x == 1 || x == 2) {
                document.getElementById("hiddenVisaExp").classList.add("d-none");
            } else {
                document.getElementById("hiddenVisaExp").classList.remove("d-none");
            }

        }
    </script>
    <script src="{{ asset('/admin/assets') }}/js/datepicker/picker.js"></script>
    <script src="{{ asset('/admin/assets') }}/js/datepicker/picker.date.js"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $('.visa_exp').pickadate({
                selectYears: 10,
                format: 'dd-mm-yyyy',
                //formatSubmit: 'Y-mm-dd'
            });
            $('.medical_check').pickadate({
                //selectYears: 10,
                format: 'dd-mm-yyyy',
                //formatSubmit: 'Y-mm-dd'
            });
            $('.police_check').pickadate({
                //selectYears: 10,
                format: 'dd-mm-yyyy',
                //formatSubmit: 'Y-mm-dd'
            });

        });
    </script>
@endpush
