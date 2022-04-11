<!DOCTYPE html>
<html>
<head>
	<title>New Candidate Register</title>
	<style type="text/css">
		@font-face {
/*  font-family: 'Special Elite';
  font-style: normal;
  font-weight: 400;
  src: local('Special Elite'), local('SpecialElite-Regular'), url(https://fonts.gstatic.com/s/specialelite/v6/9-wW4zu3WNoD5Fjka35JmwYWpCd0FFfjqwFBDnEN0bM.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;*/
}

body {
  font-family: 'Special Elite', monospace, Courier New;
  background: #eee;
}

.email {
  display: block;
  width: 470px;
  padding: 60px 100px;
  margin: 50px auto;
  background: #fff;
  box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.3);
  border-radius: 10px;
}

.signature-name 	{
  text-align:initial;
  font:16px;
  color:#666;
  padding: 0 20px;
  line-height: 24px;
}

.signature-title 	{
  font-size:14px;
  color:#666;

}

.signature-contact 	{
	color: #999;
	font-size: 14px;
  text-align:initial;
	padding: 20px 20px;

}
.signature-contact a  {
	color: #999;
	text-decoration: none;
  line-height: 24px;
}

p {
  font-size: 18px;
  margin-bottom: 1.5em;
  line-height: 1.6;
  color:#444;
}
	</style>
</head>
<body>
    <div class="email">
	  <p>Dear {{@$mail_data->info->first_name}},</p>
	  <p>A New Candidate Account Created From Your Email Address in Infinity Workforce. To Check This This Please Visit <a href="#" target="_blank">INFINITY WORKFORCE</a></p>
	  <p>Sincerly,</p>
	  <!-- EMAIL SIGNATURE STARTS HERE -->
	  <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;border-top: 3px dashed #eee;padding-top:20px;margin-top: 40px;">
	    <tbody>
	      <tr valign="top">
	        <td style="padding-left:20px;width:10px;padding-right:20px;"> 
	        	<a href="#">
	        		{{-- <img src="" height="120" alt="INFINITY WORKFORCE"> --}}
	        		INFINITY WORKFORCE
	        	</a>
	        </td>
	        <td style="border-right:3px dashed #eee;"></td>
	        <td>
	          <div class="signature-name">Admin<br> <span class="signature-title">Infinity Workforce</span> </div>
	          <div class="signature-contact">Get Emails on<br>
	          	<a href="#">Twitter</a>&nbsp;&nbsp;-&nbsp;&nbsp;<a href="#">Facebook</a>&nbsp;&nbsp;-&nbsp;&nbsp;Skype</div>
	        </td>
	      </tr>
	    </tbody>
	  </table>
	  <!-- EMAIL SIGNATURE ENDS HERE -->
	</div>
	    
    
    
    
</html>

    
  </body>
