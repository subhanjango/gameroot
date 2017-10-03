@include('layouts.head')
<!-- end::Head -->
<!-- end::Body -->
<style type="text/css">
/* The switch - the box around the slider */
.switch {
position: relative;
display: inline-block;
width: 60px;
height: 34px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
position: absolute;
cursor: pointer;
top: 0;
left: 0;
right: 0;
bottom: 0;
background-color: #ccc;
-webkit-transition: .4s;
transition: .4s;
}

.slider:before {
position: absolute;
content: "";
height: 26px;
width: 26px;
left: 4px;
bottom: 4px;
background-color: white;
-webkit-transition: .4s;
transition: .4s;
}

input:checked + .slider {
background-color: #2196F3;
}

input:focus + .slider {
box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
-webkit-transform: translateX(26px);
-ms-transform: translateX(26px);
transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
border-radius: 34px;
}

.slider.round:before {
border-radius: 50%;
}
</style>
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
<!-- BEGIN: Header -->
@include('layouts.header')
<!-- END: Header -->
<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
<!-- BEGIN: Left Aside -->
@include('layouts.leftsidebar')
<!-- END: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
@if(Session::has('msg'))
<div class="alert alert-success" role="alert">
<strong>
Well done!
</strong>

<div>{!!Session::get('msg')!!}</div>



</div>

@endif
<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
<h3 class="m-subheader__title ">
{{$Title}}
</h3>

</div>

<a href="{{$Module}}/Add" class="btn btn-primary m-btn m-btn--icon pull-right"><span><i class="fa fa-plus"></i><span>
Add New Category</span> </span></a>
</div>
</div>
<!-- END: Subheader -->
<div class="m-content">
<!--Begin::Main Portlet-->
<div class="row">
<div class="col-xl-12">
<!--begin:: Widgets/Top Products-->

<div class="m-portlet__body">
<input type="hidden" id="status_url" value="{{$status_url}}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!--begin::Widget5-->
<table id="datatable">
<thead>
<tr>
<th>Title</th>
<th>Status</th>
<th>Created By</th>
<th>Created At</th>
<th>Updated At</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($Categories as $Categories)

<tr style="padding: 0px !important">
<td>{{$Categories->title}}</td>
<td>
@if($Categories->status)
<label class="switch">
<input onchange="changestatus({{$Categories->id}})" checked type="checkbox">
<span class="slider round"></span>
</label></td>
@else
<label class="switch">
<input onchange="changestatus({{$Categories->id}})"  type="checkbox">
<span class="slider round"></span>
</label></td>
@endif
<td>{!! $Categories->creator->admin_email  !!}</td>
<td>{{$Categories->created_at}}
</td>
<td>
	{{$Categories->created_at}}
	

</td>
<td>@if(\Session::get('UserID') == $Categories->creator->id || \Session::get('UserID') == 1)
	<a href="{{url($Module.'/Delete/'.$Categories->id)}}" class="btn btn-outline-accent m-btn m-btn--icon m-btn--icon-only">
<i style="color:red" class="fa fa-archive"></i>
</a>
<a href="{{url($Module.'/Edit/'.$Categories->id)}}" class="btn btn-outline-accent m-btn m-btn--icon m-btn--icon-only">
<i style="color:orange" class="fa fa-pencil"></i>
</a>@endif</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<
<!-- begin::Footer -->
@include('layouts.footer')
<!-- end::Footer -->

<!--end::Page Snippets -->
</body>
<!-- end::Body -->
</html>
