
@include('Frontend.layout.head')
<body>
	<style type="text/css">
		
.yes-btn {
  -webkit-border-radius: 60;
  -moz-border-radius: 60;
  border-radius: 60px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  background: #34d934;
  padding: 10px 20px 10px 20px;
  border: solid #3e8a20 2px;
  text-decoration: none;
}

.yes-btn:hover {
  background: #99fc3c;
  text-decoration: none;
}

.no-btn {
  -webkit-border-radius: 60;
  -moz-border-radius: 60;
  border-radius: 60px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  background: #e60303;
  padding: 10px 20px 10px 20px;
  border: solid #f70d0d 2px;
  text-decoration: none;
}

.no-btn:hover {
  background: #c73030;
  text-decoration: none;
}

input[type=radio].css-checkbox {
							position:absolute; z-index:-1000; left:-1000px; overflow: hidden; clip: rect(0 0 0 0); height:1px; width:1px; margin:-1px; padding:0; border:0;
						}

						input[type=radio].css-checkbox + label.css-label {
							padding-left:55px;
							height:50px; 
							display:inline-block;
							line-height:50px;
							background-repeat:no-repeat;
							background-position: 0 0;
							font-size:50px;
							vertical-align:middle;
							cursor:pointer;

						}

						input[type=radio].css-checkbox:checked + label.css-label {
							background-position: 0 -50px;
						}
						label.css-label {
				background-image:url(http://csscheckbox.com/checkboxes/u/csscheckbox_b7cbb496d72400d4fe9b79cc10fca3f1.png);
				-webkit-touch-callout: none;
				-webkit-user-select: none;
				-khtml-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
			}
			.myButton {
	-moz-box-shadow: 0px -3px 30px -1px #3e7327;
	-webkit-box-shadow: 0px -3px 30px -1px #3e7327;
	box-shadow: 0px -3px 30px -1px #3e7327;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #77b55a), color-stop(1, #72b352));
	background:-moz-linear-gradient(top, #77b55a 5%, #72b352 100%);
	background:-webkit-linear-gradient(top, #77b55a 5%, #72b352 100%);
	background:-o-linear-gradient(top, #77b55a 5%, #72b352 100%);
	background:-ms-linear-gradient(top, #77b55a 5%, #72b352 100%);
	background:linear-gradient(to bottom, #77b55a 5%, #72b352 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#77b55a', endColorstr='#72b352',GradientType=0);
	background-color:#77b55a;
	-moz-border-radius:28px;
	-webkit-border-radius:28px;
	border-radius:28px;
	border:6px solid #4b8f29;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:26px;
	font-weight:bold;
	padding:18px 39px;
	text-decoration:none;
	text-shadow:0px 0px 8px #5b8a3c;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #72b352), color-stop(1, #77b55a));
	background:-moz-linear-gradient(top, #72b352 5%, #77b55a 100%);
	background:-webkit-linear-gradient(top, #72b352 5%, #77b55a 100%);
	background:-o-linear-gradient(top, #72b352 5%, #77b55a 100%);
	background:-ms-linear-gradient(top, #72b352 5%, #77b55a 100%);
	background:linear-gradient(to bottom, #72b352 5%, #77b55a 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#72b352', endColorstr='#77b55a',GradientType=0);
	background-color:#72b352;
}
.myButton:active {
	position:relative;
	top:1px;
}

	</style>
	<!-- =-=-=-=-=-=-= PRELOADER =-=-=-=-=-=-= -->
	<div class="preloader"><span class="preloader-gif"></span>
	</div>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- =-=-=-=-=-=-= HEADER =-=-=-=-=-=-= -->
	@include('Frontend.layout.header')
	<!-- HEADER Navigation End -->
	<!-- =-=-=-=-=-=-= HOME =-=-=-=-=-=-= -->

	
	<div class="full-section search-section">
		<div class="search-area container">
			<h3 class="search-title">{!! $question[0]->question_title !!}</h3>
			<h3 class="search-title">{!! html_entity_decode($question[0]->question_description) !!}</h3>
		
		</div>
	</div>
	<!-- =-=-=-=-=-=-= HOME END =-=-=-=-=-=-= -->
	<!-- =-=-=-=-=-=-= Main Area =-=-=-=-=-=-= -->

	
	<div id="listme"  class="main-content-area">
		<!-- =-=-=-=-=-=-= Latest Questions  =-=-=-=-=-=-= -->
	<section class="custom-padding" id="how-it-work">
      <div class="container">
        <!-- title-section -->
        @if(!empty($answer))
        <div class="main-heading text-center">
          {!! html_entity_decode($answer->$option) !!}
          <div class="slices"><span class="slice"></span><span class="slice"></span><span class="slice"></span>
          </div>
         <?php $stringUrl = str_replace(' ', '-', $question[0]->question_title); ?>
          <a href="{{url('Users/Answer/Yes').'/'.$question[0]->id.'/'.$stringUrl.'/'.$answer->id}}"><button class="yes-btn pull-left">Yes</button></a>

          <a href="{{url('Users/Answer/No').'/'.$question[0]->id.'/'.$stringUrl.'/'.$answer->id}}"><button class="no-btn pull-right">No</button></a>
        
		</div>
		@else
		<form method="POST" action="{{URL::to('Users/Question/Final')}}">
			{{ csrf_field() }}
		 <div class="main-heading text-center">
         <h1>No More Solutions , Is your issue resolved?</h1>
          <div class="slices"><span class="slice"></span><span class="slice"></span><span class="slice"></span>
          </div>
          
          <input type="hidden" name="qid" value="{{$question[0]->id}}">
        <div class="col-md-6"><input value="1" type="radio" name="solved" id="radio5" class="css-checkbox" checked="checked"><label for="radio5" class="css-label radGroup2">Yes</label></div>
          <div class="col-md-6"> <input value="0" type="radio" name="solved" id="radio3" class="css-checkbox"><label for="radio3" class="css-label radGroup2">No</label></div>
         <br><br><br><br><br>
        <input class="myButton" type="submit" name="" value="Post Feedback">
		</div>
		</form>
		@endif
        <!-- End title-section -->

   
      </div>
      <!-- end container -->
    </section>
		<!-- =-=-=-=-=-=-= Latest Questions  End =-=-=-=-=-=-= -->
	
		<!-- =-=-=-=-=-=-= SEPARATOR END =-=-=-=-=-=-= -->
		
		<!-- =-=-=-=-=-=-= Blog & News end =-=-=-=-=-=-= -->
	
		
		<!-- =-=-=-=-=-=-= Our Clients -end =-=-=-=-=-=-= -->
        
	
        
	</div>
	<!-- =-=-=-=-=-=-= Main Area End =-=-=-=-=-=-= -->
	
	<!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
	@include('Frontend.layout.footer')
	<!-- =-=-=-=-=-=-= JQUERY =-=-=-=-=-=-= -->
	@include('Frontend.layout.scripts')
</body>


<!-- Mirrored from templates.scriptsbundle.com/knowledge/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Sep 2017 23:31:47 GMT -->
</html>