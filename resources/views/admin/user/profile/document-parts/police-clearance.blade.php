<table>
    @if($user->doc_police_clearance->count()>0)
    <tr>
        <td>
            Police Clearance&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
        <td>
            @foreach($user->doc_police_clearance as $doc)
            <a target="_blank" href="{{asset('images/user-documents/police-clearance/'.$doc->file)}}">
                <i class="ti-download  text-success" title="Dwonload"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </a>
            @endforeach
        </td>
        <td>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ti-trash text-danger"></i>
                </a>

                <div class="user-menu dropdown-menu">
                    @foreach($user->doc_police_clearance as $key=>$doc)
                    <a href="" onclick="deleteData('{{$doc->id}}')" class="nav-link deletebtn"> Delete {{++$key}}</a>
                    @endforeach

                </div>
            </div>
        </td>
    </tr>
    @endif
</table>