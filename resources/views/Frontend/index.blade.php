﻿@include('Frontend.layout.head')<body>	<!-- =-=-=-=-=-=-= PRELOADER =-=-=-=-=-=-= -->	<div class="preloader"><span class="preloader-gif"></span>	</div>	<meta name="csrf-token" content="{{ csrf_token() }}">	<!-- =-=-=-=-=-=-= HEADER =-=-=-=-=-=-= -->	@include('Frontend.layout.header')	<!-- HEADER Navigation End -->	<!-- =-=-=-=-=-=-= HOME =-=-=-=-=-=-= -->	<div class="full-section search-section">		<div class="search-area container">			<h3 class="search-title">Have a Question?</h3>			<p class="search-tag-line">If you have any question you can ask below or enter what you are looking for!</p>			<input type="hidden" id="searchURL" value="{{$searchURL}}">			<form autocomplete="off" id="non-submit" class="search-form clearfix" >				<input type="text" title="* Please enter a search term!" placeholder="Type your search terms here" class="search-term " id="search-panel" onkeyup="searchQuestion(this.value)" autocomplete="off">				<br>				<div   class="main-content-area">				<h2 style="color:green;display:none;" id="question_show">Results Found:</h2>				<h2 style="color:red;display:none;" id="error">No Results Found</h2>				<br>				<ul id="listingquestion" ></ul>			</div>			</form>		</div>	</div>	<!-- =-=-=-=-=-=-= HOME END =-=-=-=-=-=-= -->	<!-- =-=-=-=-=-=-= Main Area =-=-=-=-=-=-= -->	@if(isset($listing))		<div id="listme"  class="main-content-area">		<!-- =-=-=-=-=-=-= Latest Questions  =-=-=-=-=-=-= -->		<section class="white question-tabs padding-bottom-80" id="latest-post">			<div style="" class="container">				<div class="row">					<!-- Content Area Bar -->					<div class="col-md-12 col-sm-12 col-xs-12">				<!--  -->						<div class="panel-body">							<div class="tab-content">								<div id="tab1" class="tab-pane active">									<!-- Question Listing -->									<div class="listing-grid" >																				@foreach($listing as $listing)										@if(!empty($listing->questions))										@foreach($listing->questions as $listing->questions)										<?php  $solveUrl=str_replace(' ', '-' ,$listing->questions->question_title); ?>									<div class="row" >																						<div class="col-md-12 col-sm-12  col-xs-12">												<h3><a href="{{ url('Users/Solve').'/'.$solveUrl }}">{!! $listing->questions->question_title !!}</a></h3>												<div class="listing-meta"> <span><i class="fa fa-clock-o" aria-hidden="true"></i>{{ $listing->questions->created_at }}</span> 												</div>											</div>											<div class="col-md-10 col-sm-10  col-xs-12">												<p>{!! html_entity_decode($listing->questions->question_description) !!}</p>																							</div>										</div>																				@endforeach										@else										<div class="row">											<h1 style="color:red">No result found.</h1>										</div>										@endif										@endforeach																			</div>								<!-- Pagination View More -->																<!-- Pagination View More End -->							</div>						</div>					</div>					<div class="clearfix"></div>				</div>			</div>			<!-- end container -->		</section>		<!-- =-=-=-=-=-=-= Latest Questions  End =-=-=-=-=-=-= -->			<!-- =-=-=-=-=-=-= SEPARATOR END =-=-=-=-=-=-= -->				<!-- =-=-=-=-=-=-= Blog & News end =-=-=-=-=-=-= -->					<!-- =-=-=-=-=-=-= Our Clients -end =-=-=-=-=-=-= -->        	        	</div>	@endif	<!-- =-=-=-=-=-=-= Main Area End =-=-=-=-=-=-= -->		<!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->	@include('Frontend.layout.footer')	<!-- =-=-=-=-=-=-= JQUERY =-=-=-=-=-=-= -->	@include('Frontend.layout.scripts')</body><!-- Mirrored from templates.scriptsbundle.com/knowledge/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Sep 2017 23:31:47 GMT --></html>