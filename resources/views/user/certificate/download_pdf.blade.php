<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Certificate Download</title>
  <meta charset="UTF-8">
  <style type="text/css">
    .container{
      position:relative;
      text-align:center;
  }

  .centered {
      position: absolute;
      width:400px;
      top: 20%;
      left: 30%;
      /*transform: translate(-30%, -50%); */
  }
  .company_logo{
    position: absolute;
    width: auto;
    right: 0;
    bottom: 20px;
  }
  </style>
</head>
<body>
  @php
      $certificate=$data
  @endphp
  <div class="container">
  <img src="http://infinityworkforce.com.au/images/certificates/certificate_bk.jpg" alt="certification" border="0">  
    <div class="centered">
    <span style="font-weight:bold">Certificate of Completion</span><br/>
      <span><i>This is to certify that</i></span>
      <br>
      <span style="font-weight:bold">{{ @$certificate->user_info->first_name }} {{ @$certificate->user_info->last_name }} IDN #{{$certificate->user_id}}</span><br>
      <span><i>has completed the course</i></span><br>
      <span style="font-weight:bold">{{@$certificate->category->name}} ({{ str_limit(@$certificate->marks, $limit = 6, $end = '') }}%) 
        @if($certificate->status==1)
        <span style="background: green;padding: 3px 2px; border-radius: 3px; color: #fff; width: 100px; font-size: 12px;">
          Passed
        </span>
        @else
          <span style="background: red;padding: 3px 2px; border-radius: 3px; color: #fff; width: 100px; font-size: 12px;">
            Failed
          </span>
        @endif
      </span>
      <p id="cdate">
         @if(@$certificate->updated_at)
             {{date('d M Y'),strtotime(@$certificate->updated_at)}}
          @else
            {{date('d M Y'),strtotime(@$certificate->created_at)}}
          @endif
      </p>
      
    </div>

  </div>
</body>
</html>