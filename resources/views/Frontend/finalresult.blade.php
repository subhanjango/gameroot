
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
	</style>
	<!-- =-=-=-=-=-=-= PRELOADER =-=-=-=-=-=-= -->
	<div class="preloader"><span class="preloader-gif"></span>
	</div>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- =-=-=-=-=-=-= HEADER =-=-=-=-=-=-= -->
	@include('Frontend.layout.header')
	<!-- HEADER Navigation End -->
	<!-- =-=-=-=-=-=-= HOME =-=-=-=-=-=-= -->


	<!-- =-=-=-=-=-=-= HOME END =-=-=-=-=-=-= -->
	<!-- =-=-=-=-=-=-= Main Area =-=-=-=-=-=-= -->

	
	<div id="listme"  class="main-content-area">
		<!-- =-=-=-=-=-=-= Latest Questions  =-=-=-=-=-=-= -->
	<section class="custom-padding" id="how-it-work">
      <div class="container">
        <!-- title-section -->
        
        <div class="main-heading text-center">
         @if($solved)

         {!! html_entity_decode($final[0]->success) !!}
        @else
		{!! html_entity_decode($final[0]->unsuccess) !!}
		@endif
		<h1>Path You Followed: </h1>
		<ul>
		@if(!empty($showPath))
		@for($i = 0; $i < count($showPath); $i++)
		<li>{!! html_entity_decode($showPath[$i]) !!}</li>
		@endfor
		@endif
		</ul>
		</div>
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