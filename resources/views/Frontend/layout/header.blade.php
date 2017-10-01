<div class="top-bar">
	<div class="container">
		<div class="row">
			
			@if(isset($User) && !empty($User))
			<div class="col-lg-8 col-md-8 col-sm-6 col-xs-8 pull-right">
				<ul class="top-nav nav-right">
					
					<li class="dropdown"> 
						<a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" data-animations="fadeInUp">
							
							<span class="hidden-xs small-padding">
								<span>{{ $User->email }}</span>
							 <i class="fa fa-caret-down"></i>
							</span>
						</a>
						<ul class="dropdown-menu ">
							<li><a href="profile.html"><i class=" icon-bargraph"></i> Dashboard</a></li>
							<li><a href="profile-setting.html"><i class=" icon-gears"></i> Profile Setting</a></li>
							<li><a href="question-list.html"><i class="icon-heart"></i> Questions</a></li>
							<li><a href="#"><i class="icon-lock"></i> Logout</a></li>
						</ul>
					 </li>
				</ul>
			</div>
			@endif
		</div>
	</div>
</div>
	<!-- =-=-=-=-=-=-= HEADER Navigation =-=-=-=-=-=-= -->
	<div class="navbar navbar-default">
		<div class="container">
			<!-- header -->
			<div class="navbar-header">
				<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">	<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- logo -->
				<a href="{{ url('/Users') }}" class="navbar-brand">
					<img class="img-responsive" alt="" src="{{URL::to('frontend/images/logo.png')}}">
				</a>
				<!-- header end -->
			</div>
			<!-- navigation menu -->
			<div class="navbar-collapse collapse">
				<!-- right bar -->
				<ul class="nav navbar-nav navbar-right">
					@if(!empty($allowedCategory))
					@foreach($allowedCategory as $allowedCategory)
					<li class="dropdown"> <a class="dropdown-toggle " data-hover="dropdown" data-toggle="dropdown" data-animations="fadeInUp">{!! $allowedCategory->title !!}<b class="caret"></b></a>
						<ul class="dropdown-menu">
							@foreach($allowedCategory->subcategories as $subcategoriesTitle)
							<?php  $Urlname = str_replace(' ' , '-' , $subcategoriesTitle->title) ?>
							<li><a href="{{ url('Users/Question/').'/'.$Urlname }}">{!! $subcategoriesTitle->title !!}</a>
							</li>
							@endforeach
						</ul>
					</li>
					@endforeach
					@endif
					<li>
						<div class="btn-nav"><a href="post-question.html" class="btn btn-primary btn-small navbar-btn">Post Question</a>
						</div>
					</li>
				</ul>
			</div>
			<!-- navigation menu end -->
			<!--/.navbar-collapse -->
		</div>
	</div>