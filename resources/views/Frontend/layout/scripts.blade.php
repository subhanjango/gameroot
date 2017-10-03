	<script src="{{URL::to('frontend/js/jquery.min.js')}}"></script>
	<!-- Bootstrap Core Css  -->
	<script src="{{URL::to('frontend/js/bootstrap.min.js')}}"></script>
	<!-- Jquery Smooth Scroll  -->
	<script src="{{URL::to('frontend/js/jquery.smoothscroll.js')}}"></script>
	<!-- Jquery Easing -->
	<script type="{{URL::to('frontend/text/javascript')}}" src="js/easing.js"></script>
	<!-- Jquery Counter -->
	<script src="{{URL::to('frontend/js/jquery.countTo.js')}}"></script>
	<!-- Jquery Waypoints -->
	<script src="{{URL::to('frontend/js/jquery.waypoints.js')}}"></script>
	<!-- Jquery Appear Plugin -->
	<script src="{{URL::to('frontend/js/jquery.appear.min.js')}}"></script>
	<!-- Carousel Slider  -->
	<script src="{{URL::to('frontend/js/carousel.min.js')}}"></script>
	<!-- Jquery Parallex -->
	<script src="{{URL::to('frontend/js/jquery.stellar.min.js')}}"></script>
	<!--Style Switcher -->
	<script src="{{URL::to('frontend/js/bootstrap-dropdownhover.min.js')}}"></script>
	<!-- Include jQuery Syntax Highlighter -->
	<script type="text/javascript" src="{{URL::to('frontend/scripts/shCore.js')}}"></script>
	<script type="text/javascript" src="{{URL::to('frontend/scripts/shBrushPhp.js')}}"></script>
	<!-- Template Core JS -->
	<script src="{{URL::to('frontend/js/custom.js')}}"></script>
	<script type="text/javascript">

		<?php if(isset($listing)){ ?>
			 $("html, body").delay(1000).animate({
        scrollTop: $('#listme').offset().top 
    }, 2000);
		<?php } ?>
		$("#non-submit").submit(function(e) {
    e.preventDefault(e);
});
		function searchQuestion(str) {
			// body...
			if($.trim($('#search-panel').val()) != "" ){
				console.log($('#search-panel').val());
			$('#listingquestion').html("");
	url = $('#searchURL').val();
	$.ajax({
    url : url,
    type: "POST",
  data : 'str='+str,
    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
  dataType: 'json', // ** ensure you add this line **
    success: function(data) {
    	if(data.length > 0){
    	$('#question_show').css('display','block');
    	$('#error').css('display','none');
   for (var i = data.length - 1; i >= 0; i--) {
   	string = data[i].question_title;
   	string = string.replace(' ','-');
   	getUrl =  {!! json_encode(url('/')) !!};
        $('#listingquestion').append('<li><div class="row"><div class="col-md-7 col-sm-8  col-xs-12"><h3><a  href="'+getUrl+'/Users/Solve/'+string+'"><b><p class="text-center" style="color: white;font-size: 22px;" id="questiontitle">'+data[i].question_title+'</p></b></a></h3></div><div class="col-md-10 col-sm-10  col-xs-12"><p id="questiondescription"></p></div></div></li>');
      }
      
      }else{
      	$('#question_show').css('display','none');
      	$('#error').css('display','block');
      }
    }, 
   
});
		}else{
			$('#question_show').css('display','none');
			$('#error').css('display','none');
			$('#listingquestion').html('');
		} }
	</script>