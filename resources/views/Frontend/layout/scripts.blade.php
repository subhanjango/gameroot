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
		$("#non-submit").submit(function(e) {
    e.preventDefault(e);
});
		function searchQuestion(str) {
			// body...
			if(str != "" || str != 'undefined'){
			$('#listingquestion').html("");
	url = $('#searchURL').val();
	$.ajax({
    url : url,
    type: "POST",
  data : 'str='+str,
    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
  dataType: 'json', // ** ensure you add this line **
    success: function(data) {
    	$('#question_show').toggle();
   for (var i = data.length - 1; i >= 0; i--) {
        $('#listingquestion').append('<li><div class="row"><div style="background: #00ff43;" class="col-md-7 col-sm-8  col-xs-12"><h3><a  href="#"><p id="questiontitle">'+data[i].question_title+'</p></a></h3></div><div class="col-md-10 col-sm-10  col-xs-12"><p id="questiondescription"></p></div></div></li>');
      }
      
      
    },
   
});
		} }
	</script>