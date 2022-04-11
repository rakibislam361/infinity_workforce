<table>
    @if($user->doc_visas->count()>0)
    <tr>
        <td>
            Visa&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
        <td>
            @foreach($user->doc_visas as $doc)
            <a target="_blank" href="{{asset('images/user-documents/visa/'.$doc->file)}}">
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
                    @foreach($user->doc_visas as $key=>$doc)
                    <a href="" onclick="deleteData('{{$doc->id}}')" class="nav-link deletebtn"> Delete {{++$key}}</a>
                    @endforeach

                </div>
            </div>
        </td>
    </tr>
    @endif
</table>