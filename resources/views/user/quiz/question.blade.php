

@extends('layouts.master')

@push('title') Quiz Test @endpush
@push('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/assets/owl.carousel.min.css">
<link rel="stylesheet" href="http://themes.audemedia.com/html/goodgrowth/css/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> 
<style type="text/css">
	.panel-body p{
		color: #333;

	}
	.question{
		color: #333;
		font-size: 16px;
	}
.question label{
		cursor: pointer;
	}
	.owl-carousel .owl-nav [class*='owl-'] {
  -webkit-transition: all .3s ease;
  transition: all .3s ease;
  color: #333;
}
.owl-carousel .owl-nav [class*='owl-'].disabled:hover {
  background-color: #D6D6D6;
}
.owl-carousel {
  position: relative;
}
.owl-carousel .owl-next,
.owl-carousel .owl-prev {
  width: 22px;
  height: 40px;
  margin-top: -20px;
  position: absolute;
  top: 45%;
  color: #fff;
}
.owl-carousel .owl-prev {
  left: 10px;
}
.owl-carousel .owl-next {
  right: 10px;
}
.testimonials{
 background-color: #f3f3f3;

border-radius: 3px;
}
.border-right{
  border-left: 2px solid #ddd;
}

		#customers-testimonials .item {
		   
		    padding: 50px;
		    transition: all 0.3s ease-in-out;
		}
.shadow-effect img{
  height: 150px;
}
.big-title{
  color: #fff;
  font-size: 24px;
  text-align: left;
}


.owl-carousel .owl-nav {
  /*default owl-theme theme reset .disabled:hover links */
}
.owl-carousel .owl-nav [class*='owl-'] {
  transition: all .3s ease;
}
.owl-carousel .owl-nav [class*='owl-'].disabled:hover {
  background-color: #D6D6D6;
}
.owl-carousel {
  position: relative;
}
.owl-carousel .owl-next,
.owl-carousel .owl-prev {
  width: 22px;
  height: 40px;
  margin-top: -20px;
  position: absolute;
  top: 45%;
  color: #fff;
}
.owl-carousel .owl-prev {
  left: 10px;
}
.owl-carousel .owl-next {
  right: 10px;
}
.container {

    max-width: 1000px !important;

}
.panel-body h4{
	margin-bottom: 10px;
}
.owl-nav .disabled{
	opacity: 0;
}
.quiz-btn{
	width: 120px;

height: 54px;

font-size: 22px;

margin-top: 12%;
}
</style>

@endpush
@section('content')	
	<div class="animated fadeIn">
	 <div class="col-sm-12 mb-3">
    	<h3 class="">{{$category->name}}</h3>
    </div>
	<form action="{{route('user-submit-quiz')}}" method="post">
		@csrf
		<input type="hidden" name="total_question" value="{{@$total_question}}">
		<input type="hidden" name="category_id" value="{{@$category->id}}">
		<section class="testimonials">
			<div class="container">

		      <div class="row">
		         <div class="col-sm-12">
		          <div id="customers-testimonials" class="owl-carousel">

		           	@foreach($questions as $key=>$question)
			            <div class="item">
			              
			              <div class="shadow-effect">
			                <div class="row">
			                  <div class="col-sm-12">
			                	<div class="panel-body">
											<h4>{{++$key}}. {{$question->question}}</h4>
										</div>
										<ul class="list-group">
											<li class="list-group-item" data-select="a">
												<label>
													
													<span href="#" class="btn btn-info">A</span>
													<input type="radio" name="{{$question->id}}" value="@if($question->right_ans==1) yes @else no @endif">
													{{$question->option_1}}
												</label>
											</li>
											<li class="list-group-item" data-select="a">
												<label>
													<span href="#" class="btn btn-info">B</span>
													<input type="radio" name="{{$question->id}}" value="@if($question->right_ans==2) yes @else no @endif">
													{{$question->option_2}}
												</label>
											</li>
											<li class="list-group-item" data-select="a">
												<label>
													<span href="#" class="btn btn-info">C</span>
													<input type="radio" name="{{$question->id}}" value="@if($question->right_ans==3) yes @else no @endif">
													{{$question->option_3}}
												</label>
											</li>
											<li class="list-group-item" data-select="a">
												<label>
													<span href="#" class="btn btn-info">D</span>
													<input type="radio" name="{{$question->id}}" value="@if($question->right_ans==4) yes @else no @endif">
													{{$question->option_4}}
												</label>
											</li>
											
										</ul>

			                  </div>
			                  
			                </div>
			              </div>
			            </div>
		        	@endforeach
		           	<div class="item">
			            <div class="shadow-effect">
			                <div class="row">
			                  <div class="col-sm-12">
				                	<div class="panel-body text-center">
				                		<input type="submit" value="Submit" class="btn btn-md btn-info quiz-btn">
				                	</div>
				                </div>
				            </div>
				        </div>
			    	</div>
		           
		          </div>
		        </div>
		      </div>
		      </div>
		</section>
	</form>
@endsection

@push('footer2')
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/owl.carousel.min.js'></script>

  

    <script >
    	jQuery(document).ready(function($) {
		"use strict";
		//  TESTIMONIALS CAROUSEL HOOK
		$('#customers-testimonials').owlCarousel({
		    loop: true,
		    items: 3,
		    margin: 0,
		    autoplay: false,
		    loop: false,
		    dots:true,
		    nav:true,
		    autoplayTimeout: 8500,

		    smartSpeed: 450,
		  navText: ['<i class="fa fa-angle-left fa-3x"></i>','<i class="fa fa-angle-right fa-3x"></i>'],
		    responsive: {
		      0: {
		        items: 1
		      },
		      768: {
		        items: 1
		      },
		      1170: {
		        items: 1
		      }
		    }
		  });
		});

		function moved() {
	    var owl = $("#customers-testimonials").data('owlCarousel');
	    if (owl.currentItem + 1 === owl.itemsAmount) {
	        alert('THE END');
	    }
	}
    </script>

@endpush