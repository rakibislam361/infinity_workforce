

<form action="{{route('user-self-managed-fund-store')}}" method="post" class="needs-validation" novalidate>
    @csrf
   <div class="row">
        <div class="form-group col-md-12">
            <strong class="card-title float-left">Self Managed Super Fund</strong>
        </div>
        <div class="form-group col-md-4">
            <label for="number" class="control-label mb-1">Number{{-- <small class="text-danger">*</small> --}}</label>
            <input id="number" name="number" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="Number" value="@if(old('number')){{old('number')}}@else{{@$user->self_fund->number}}@endif" required="" >
             <span class="text-danger"> {{ $errors->first('number') }}</span>
             <div class="invalid-feedback">Number Field Is Required & Must be Number</div>
        </div>
        <div class="form-group col-md-4">
            <label for="abn" class="control-label mb-1">ABN</label>
            <input id="abn" name="abn" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="ABN" value="@if(old('abn')){{old('abn')}}@else{{@$user->self_fund->abn}}@endif" required="">
             <span class="text-danger"> {{ $errors->first('abn') }}</span>
              <div class="invalid-feedback">ABN Field Is Required & Must be Number</div>
        </div>
        <div class="form-group col-md-4">
            <label for="esa" class="control-label mb-1"> ESA{{-- <small class="text-danger">*</small> --}}</label>
            <input id="esa" name="esa" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="ESA" value="@if(old('esa')){{old('esa')}}@else{{@$user->self_fund->esa}}@endif">
             <span class="text-danger"> {{ $errors->first('esa') }}</span>
        </div>
        <div class="form-group col-md-4">
            <label for="usi_code" class="control-label mb-1"> USI Code{{-- <small class="text-danger">*</small> --}}</label>
            <input id="usi_code" name="usi_code" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="USI Code" value="@if(old('usi_code')){{old('usi_code')}}@else{{@$user->self_fund->usi_code}}@endif">
             <span class="text-danger"> {{ $errors->first('usi_code') }}</span>
        </div>
        <div class="form-group col-md-4">
            <label for="membership_number" class="control-label mb-1"> Membership Number{{-- <small class="text-danger">*</small> --}}</label>
            <input id="membership_number" name="membership_number" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Membership Number" value="@if(old('membership_number')){{old('membership_number')}}@else{{@$user->self_fund->membership_number}}@endif">
             <span class="text-danger"> {{ $errors->first('membership_number') }}</span>
        </div>
        <div class="form-group col-md-4">
            <label for="acc_name" class="control-label mb-1"> Account Name{{-- <small class="text-danger">*</small> --}}</label>
            <input id="acc_name" name="acc_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Account Name" value="@if(@$user->self_fund->acc_name){{@$user->self_fund->acc_name}}@else{{old('acc_name')}}@endif">
             <span class="text-danger"> {{ $errors->first('acc_name') }}</span>
        </div>
        
        
       
        <div class="col-lg-12 text-right mt-3">
            <button type="reset" class="btn btn-warning mr-3"><i class="ti-reload mr-1"></i> Reset</button>
            <button type="submit" class="btn btn-info"><i class="ti-save-alt mr-1"></i> Update</button>
        </div>
        
   </div>
   </form>