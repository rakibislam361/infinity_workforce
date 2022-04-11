
<div class="row">
    <div class="col-md-12">
        <strong class="card-title float-left">Certificate List</strong>
    </div>
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">ID</th>
                    <th scope="col">CATEGORY</th>
                    <th scope="col">SCORE</th>
                    <th scope="col">RESULT</th>
                    <!-- <th scope="col" class="text-center">ATTEMPTED</th> -->

                    <th scope="col">EXAM DATE</th>
                    <!-- <th scope="col" class="text-center">ACTIONS</th> -->
                </tr>
            </thead>
            <tbody>

                @foreach(@$user->certificates as $key=>$certificate)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$certificate->id}}</td>
                    
                    <td>{{@$certificate->category->name}}</td>
                    <td>{{$certificate->marks}} %</td>
                    <td>
                        @if($certificate->status==1)
                        <div class="badge badge-success">Passed</div> 
                        @else
                        <div class="badge badge-danger">Failed</div> 
                        @endif
                    </td>
                   {{--  <td class="text-center">
                        {{ $certificate->attempted }}
                        @if($certificate->category->attempted)
                            /{{$certificate->category->attempted}}
                        @endif
                    </td> --}}
                    <td>
                        @if($certificate->updated_at)
                            <span title="Updated">{{date('d M Y'),strtotime($certificate->updated_at)}}</span>
                        @else
                            <span title="Created">{{date('d M Y'),strtotime($certificate->created_at)}}</span>
                        @endif
                    </td>
                   
                    <!-- <td>
                        <a href="{{url('user/certificate/download')}}/{{$certificate->id}}" title="Download Certificate" class="btn btn-info" target="_blank" download><i class="ti-download"></i></a>                       
                    </td> -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>

