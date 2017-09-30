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
Give Permission's</span> </span></a>

</div>
</div>
<!-- END: Subheader -->
<div class="m-content">
<!--Begin::Main Portlet-->
<div class="row">
<div class="col-xl-12">
<!--begin:: Widgets/Top Products-->

<div class="m-portlet__body">
<!-- <?php //echo '<pre>'; print_r($SubCategories);die; ?> -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--begin::Widget5-->
<input type="hidden" id="getGroupURL" value="{{ $getGroups }}">
<input type="hidden" id="getCategoryURL" value="{{ $getCategories }}">
<table id="datatable" class="text-center">
<thead class="text-center">
<tr >
<th  class="text-center">Group Title</th>
<th  class="text-center">Members</th>
<th  class="text-center">Permission On</th>
<th  class="text-center">Action</th>
</tr>
</thead>
<tbody>
@foreach($UserGroups as $UserGroups)

<tr style="padding: 0px !important">
<td>{{$UserGroups->group_title}}</td>
<td onclick="getGroupMembers({{$UserGroups->id}})" class="text-center"><i class="fa fa-users " aria-hidden="true"></i></td>
<td onclick="getSubCategories({{$UserGroups->id}})" class="text-center"><i class="fa fa-question-circle" aria-hidden="true"></i> </td>
<td><a href="{{url($Module.'/Delete/'.$UserGroups->id)}}" class="btn btn-outline-accent m-btn m-btn--icon m-btn--icon-only">
<i style="color:red" class="fa fa-archive"></i>
</a>
<a href="{{url($Module.'/Edit/'.$UserGroups->id)}}" class="btn btn-outline-accent m-btn m-btn--icon m-btn--icon-only">
<i style="color:orange" class="fa fa-pencil"></i>
</a></td>
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
<!-- Modal -->
<div id="myUsers" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="heading"></h4>
      </div>
      <div class="modal-body">
        <ul id="users"></ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- begin::Footer -->
@include('layouts.footer')
<!-- end::Footer -->

<!--end::Page Snippets -->
</body>
<!-- end::Body -->
</html>
