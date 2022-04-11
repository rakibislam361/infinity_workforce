    


    <!-- Scripts -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
	@if ($message = Session::get('success'))
		<script src="{{ asset('/admin/assets')}}/js/notifications/jgrowl.min.js"></script>
		<script type="text/javascript">
		    var msg = '{{$message}} ';   
		    $.jGrowl(msg, {
		        header: 'Success',
		        theme: 'alert-bordered alert-styled-left alert-success'
		    });
		</script>
	@endif 
	{{-- error show--}}
	@if ($errors->any())
	    <script src="{{ asset('/admin/assets')}}/js/notifications/jgrowl.min.js"></script>
		<script type="text/javascript">
		    @foreach($errors->all() as $error)
		        
		    
		    var msg = '{{$error}} ';   
		    $.jGrowl(msg, {
		        header: 'Error',
		        theme: 'alert-bordered alert-styled-left alert-danger',
		         life: 50000
		    });
		    @endforeach
		</script>
	@endif

    @stack('footer')
 
    <script src="{{asset('admin')}}/assets/js/main.js"></script>
     @stack('footer2')
    
</body>
</html>
