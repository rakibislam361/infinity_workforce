<div style="width: 80%; margin: auto; border: 1px solid #333; padding: 30px; text-align: center;">
	<h2>Infinite Workforce</h2>
	<h3>Certificate</h3>
	  <table class="table table-striped" style="width: 100%; text-align: center;">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">CATEGORY</th>
                    <th scope="col">SCORE</th>
                    <th scope="col">RESULT</th>
                    <th scope="col">EXAM DATE</th>
                </tr>
            </thead>
            <tbody>
            	{{$certificate=$data}}
                <tr>
                    <td>{{$certificate->id}}</td>
                    
                    <td>{{@$certificate->category->name}}</td>
                    <td>{{$certificate->marks}} %</td>
                    <td>
                        @if($certificate->status==1)
                        <div style="color: green;">Passed</div> 
                        @else
                        <div style="color: red;">Failed</div> 
                        @endif
                    </td>
                    <td>
                        @if($certificate->updated_at)
                            <span title="Updated">{{date('d M Y'),strtotime($certificate->updated_at)}}</span>
                        @else
                            <span title="Created">{{date('d M Y'),strtotime($certificate->created_at)}}</span>
                        @endif
                    </td>
                   
                </tr>
                
            </tbody>
        </table>
</div>