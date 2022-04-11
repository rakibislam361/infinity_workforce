
<div class="row">
    <div class="form-group col-md-12 mb-3">
        <strong class="card-title float-left">Bank Details</strong>
    </div>
    <div class="form-group col-md-4">
        <label for="account_name" class="control-label mb-1">Account Name {{-- <small class="text-danger">*</small> --}}</label>
        <input id="account_name" name="account_name" type="text" class="form-control" aria-required="true" aria-invalid="false"  required="" value="@if(old('account_name')){{old('account_name')}}@else{{@$user->bank_info->ac_name}}@endif" disabled>
         <span class="text-danger"> {{ $errors->first('account_name') }}</span>
    </div>
    <div class="form-group col-md-4">
        <label for="bsb" class="control-label mb-1">BSB {{-- <small class="text-danger">*</small> --}}</label>
        <input id="bsb" name="bsb" type="number" class="form-control" aria-required="true" aria-invalid="false" value="@if(old('bsb')){{old('bsb')}}@else{{@$user->bank_info->bsb}}@endif" disabled>
         <span class="text-danger"> {{ $errors->first('bsb') }}</span>
    </div>
    <div class="form-group col-md-4">
        <label for="ac_no" class="control-label mb-1">Acc No.<small class="text-danger">*</small></label>
        <input id="ac_no" name="ac_no" type="text" class="form-control" aria-required="true" aria-invalid="false"  required="" value="@if(old('ac_no')){{old('ac_no')}}@else{{@$user->bank_info->ac_no}}@endif" disabled>
         <span class="text-danger"> {{ $errors->first('ac_no') }}</span>
    </div>
  {{--   <div class="form-group col-md-4">
        <label for="abn" class="control-label mb-1">ABN<small class="text-danger">*</small></label>
        <input id="abn" name="abn" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="ABN" required="" value="{{@$user->bank_info->abn}}">
         <span class="text-danger"> {{ $errors->first('abn') }}</span>
    </div>
    <div class="form-group col-md-4">
        <label for="tfn" class="control-label mb-1">TFN<small class="text-danger">*</small></label>
        <input id="tfn" name="tfn" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="TFN" required="" value="{{@$user->bank_info->tfn}}">
         <span class="text-danger"> {{ $errors->first('tfn') }}</span>
    </div> --}}
</div>
