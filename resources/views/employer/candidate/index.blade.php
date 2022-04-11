@extends('layouts.master')
 @push('title')
        Candidate List
  @endpush
@push('head')
	<style type="text/css">
	table{
		font-size: 12px;

	}
	</style>
@endpush
@section('content')
	<div class="animated fadeIn">    
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{url('employer/assigned-candidate/search')}}" method="get">
                            <div class="row">
                            <div class="form-group col-md-12">
                                <strong>Search Candidate</strong>
                            </div>
                            <div class="form-group col-md-2">
                                <input type="number" name="idn" class="form-control" placeholder="Search By ID" value="{{@$data_id}}">
                            </div>
                            <div class="form-group col-md-2">
                                <input type="text" name="name" class="form-control" placeholder="Search By Name" value="{{@$data_name}}">
                            </div>
                            <div class="form-group col-md-2">
                                <input type="text" name="email" class="form-control" placeholder="Search By Email" value="{{@$data_email}}">
                            </div>
                                <div class="form-group col-md-2">
                                <input type="text" name="suburb" class="form-control" placeholder="Search By Suburb" value="{{@$data_suburb}}" >
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-2">
                                <select name="visa" required="" class="form-control">
                                    <option value="0" @if($data_visa==0) selected @endif >Select Visa Type</option>
                                    <option value="1" @if(@$data_visa==1) selected @endif>Citizen</option>
                                    <option value="2" @if(@$data_visa==2) selected @endif>Permanent Resident</option>
                                    <option value="3" @if(@$data_visa==3) selected @endif>Temporary resident</option>
                                    <option value="4" @if(@$data_visa==4) selected @endif>Dependent visa</option>
                                    <option value="5" @if(@$data_visa==5) selected @endif>Holiday visa</option>
                                    <option value="6" @if(@$data_visa==6) selected @endif>Student visa A</option>
                                    <option value="7" @if(@$data_visa==7) selected @endif>Student visa B</option>
                                    <option value="8" @if(@$data_visa==8) selected @endif>Student visa C</option>
                                    <option value="9" @if(@$data_visa==9) selected @endif>Student visa D</option>
                                </select>
                                <span class="text-danger"> {{ $errors->first('visa') }}</span>
                            </div>
                            
                            
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-info"><i class="ti-search mr-1"></i> Search</button>
                            </div>

                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
                        <div class="card-header ">
                            <strong class="card-title float-left">{{@$heading}}</strong>
                             <div class="text-right">
                                <a href="{{route('admin-user-create')}}" title="Add New User" class="btn btn-info btn-sm">Add New</a>
                            </div>
                        </div>
                       
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <th scope="col" rowspan="2">Work Location (Assign)</th>
                                        <th scope="col" rowspan="2">ID</th>
                                        <th scope="col" colspan="3">Applicant Name</th>
                                        <th scope="col" rowspan="2">Gender</th>
                                        <th scope="col" rowspan="2">Phone number</th>
                                        <th scope="col" rowspan="2">Email Address</th>
                                        <th scope="col" colspan="2">VISA/Citizenship</th>
                                        <th scope="col" colspan="3">Address</th>
                                        <th scope="col" colspan="2">Bank Details</th>
                                        
                                        <th scope="col" rowspan="2">Medical Check  completed the:</th>
                                        <th rowspan="2">Police Check completed the:</th>
                                        <th rowspan="2">ABN</th>
                                        <th rowspan="2">(employee) TFN</th>
                                        <th colspan="6">Self Managed Super Fund (SMSF)</th>
                                        <th rowspan="2">Action</th>
                                       
                                    </tr>
                                    <tr>
                                        <td>First Name</td>
                                        <td>Middle Name</td>
                                        <td>Last Name</td>
                                        {{--Visa--}}
                                        <td>VISA Expire</td>
                                        <td>VISA Status</td>
                                        {{--address--}}
                                        <td>Full Address</td>
                                        <td>Suburb/Town</td>
                                        <td>Postcode</td>
                                        {{--bank details--}}
                                        <td>BSB</td>
                                        <td>Account Number</td>
                                        <td>Number</td>
                                        <td>ABN for SMSF</td>
                                        <td>ESA for SMSF</td>
                                        <td>USI code</td>
                                        <td>Memberhip Number</td>
                                        <td>Super FundAcc Name</td>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                       <td>Au</td>
                                       <td>{{$user->id}}</td>
                                        <td>
                                            <a href="{{ route('employer-assigned-candidate-profile',[$user->id]) }}" target="_blank" class="text-dark">
                                                {{@$user->info->first_name}}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('employer-assigned-candidate-profile',[$user->id]) }}" target="_blank" class="text-dark">
                                                {{@$user->info->mid_name}}</td>
                                            </a>
                                        <td>
                                            <a href="{{ route('employer-assigned-candidate-profile',[$user->id]) }}" target="_blank" class="text-dark">
                                                {{@$user->info->last_name}}</td>
                                            </a>
                                        <td>
                                            @if(@$user->info->gender==1)
                                            Male
                                            @elseif(@$user->info->gender==2)
                                            Female
                                            @elseif(@$user->info->gender==3)
                                            Other
                                            @else
                                            N/A
                                            @endif
                                        </td>
                                        <td>
                                            {{@$user->info->call_code->calling_code}}- 
                                            {{@$user->info->phone}}
                                        </td>

                                        <td>
                                            <a href="mailto:{{$user->email}}" title="{{$user->email}}">
                                                {{$user->email}}
                                            </a>
                                        </td>
                                        <td class="medium">
                                             @if(@$user->info->visa==1 || @$user->info->visa==2)
                                                    -
                                                @else
                                                 {{date('d M Y', strtotime(@$user->info->visa_exp))}}
                                                @endif
                                           

                                        </td>
                                        <td>
                                            @if(@$user->info->visa_exp)
                                                @php
                                                    $today = Carbon\Carbon::today();
                                                    $today=date('Y-m-d', strtotime($today));
              
                                                    $exp=date('Y-m-d', strtotime($user->info->visa_exp));
                                                    if($today>$exp){

                                                        echo "<div class='badge badge-danger'>Expired</div>";
                                                    }
                                                    else{
                                                        if(@$user->info->visa==1)
                                                            echo 'Citizen';
                                                        elseif(@$user->info->visa==2)
                                                            echo 'Permanent Resident';
                                                        elseif(@$user->info->visa==3)
                                                            echo 'Temporary resident';
                                                        elseif(@$user->info->visa==4)
                                                            echo 'Dependent visa';
                                                        elseif(@$user->info->visa==5)
                                                            echo 'Holiday visa';
                                                        elseif(@$user->info->visa==6)
                                                            echo 'Student visa A';
                                                        elseif(@$user->info->visa==7)
                                                            echo 'Student visa B';
                                                        elseif(@$user->info->visa==8)
                                                            echo 'Student visa C';
                                                        elseif(@$user->info->visa==9)
                                                            echo 'Student visa D';

                                                        else{
                                                            echo '-';
                                                        }
                                                    }
                                                    
                                                    
                                                @endphp
                                            @endif
                                        </td>
                                        <td class="large">
                                            {{@$user->info->address}}
                                        </td>
                                        <td>
                                            {{@$user->info->town_city}}
                                        </td>
                                        <td>
                                            {{@$user->info->postcode}}
                                        </td>
                                        {{--bank info--}}
                                        <td>
                                            {{@$user->bank_info['bsb']}}
                                        </td>
                                        <td>
                                            {{@$user->bank_info->ac_no}}
                                        </td>
                                        
                                        <td class="text-center">
                                            
                                            @if(@$user->info->medical_check_date)
                                            {{date('d M Y',strtotime(@$user->info->medical_check_date))}}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            
                                            @if(@$user->info->police_check_date)
                                            {{date('d M Y',strtotime(@$user->info->police_check_date))}}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            {{@$user->bank_info->abn}}
                                        </td>
                                        <td>
                                            {{@$user->bank_info->tfn}}
                                        </td>
                                        {{-- self managed fund --}}
                                        <td>
                                            {{@$user->self_fund->number}}   
                                        </td>
                                        <td>
                                            {{@$user->self_fund->abn}}          
                                        </td>
                                        <td>
                                            {{@$user->self_fund->esa}}      
                                        </td>
                                        <td>
                                            {{@$user->self_fund->usi_code}}     
                                        </td>
                                        <td>
                                            {{@$user->self_fund->membership_number}}    
                                        </td>
                                        <td>
                                            {{@$user->self_fund->acc_name}} 
                                        </td>
                                        <td>
                                            <a href="{{ route('employer-assigned-candidate-profile',[$user->id]) }}" title="view Profile" class="btn btn-success btn-sm" target="_blank">View Profile</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                        
                    </div>
			</div>
		</div>
       
	</div>

@endsection
@push('footer')

	
@endpush