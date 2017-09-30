 @include('layouts.head')
  <style type="text/css">
  dl.decision-tree dd.collapsed {
  display:none;
  }
  </style>
  <!-- end::Head -->
  <!-- end::Body -->
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
  <div class="m-subheader ">
  <div class="d-flex align-items-center">
  <div class="mr-auto">
  <h3 class="m-subheader__title ">
  {{$Title}}
  </h3>

  </div>

  </div>
  </div>
  <!-- END: Subheader -->
  <div class="m-content">
  <!--Begin::Main Portlet-->
  <div class="row">
  <div class="col-xl-12">
  <!--begin:: Widgets/Top Products-->

  <div class="m-portlet__body">

  <!--begin::Widget5-->
  @if(count( $errors ) > 0 )
  <div class="alert alert-danger" role="alert">
  <strong>
  Oh snap!
  </strong>

  @foreach ($errors->all() as $error)
  <div>{{ $error }}</div>
  @endforeach

  </div>

  @endif
  @if(Session::has('msg'))
  <div class="alert alert-success" role="alert">
  <strong>
  Well done!
  </strong>

  <div>{!!Session::get('msg')!!}</div>



  </div>

  @endif

  <!--begin::Form-->
  <form class="m-form" method="{{$Method}}" action="{{$Action}}">
  {{csrf_field()}}
  <div class="m-portlet__foot m-portlet__foot--fit pull-right">
  <div class="m-form__actions m-form__actions">
  <button type="submit" class="btn btn-primary">
  Submit
  </button>
  <button type="reset" class="btn btn-secondary">
  Cancel
  </button>
  </div>
  </div>
  <div class="m-portlet__body">
  <div class="m-form__section m-form__section--first">
    <label> Select Sub Category: </label>&nbsp;
    <select value="{{old('subcategory')}}" name="subcategory">
      <option value="">Select Here</option>      
      @if(!empty($subcategories))
      @foreach($subcategories as $subcategories)
      <option value="{{$subcategories->id}}">{{$subcategories->title}}</option>
    @endforeach
    @endif
      </select>
  <div class="form-group m-form__group">
  <label>
  Title:

  <input type="text" value="{{old('title')}}" name="title" class="form-control m-input" placeholder="Enter Question Title">
  </label>
  <br>
  <h3>
  Description:
  </h3>

  <textarea style="width: 100%" name="description" rows="5">{{old('description')}}</textarea>
  <div class="text-center">
  <h3>Solution</h3>
  </div>
  <div class="text-center">

  <textarea name="solution" style="width: 100%" id="#textarea" rows="3">{{old('Solution')}}</textarea>
  </div>

  <div class="text-center">
  <h3>Success Message</h3>
  </div>
  <div class="text-center">

  <textarea name="success" style="width: 100%" id="#textarea" rows="3">{{old('Solution')}}</textarea>
  </div>

  <div class="text-center">
  <h3>Un-Success Message</h3>
  </div>
  <div class="text-center">

  <textarea name="unsuccess" style="width: 100%" id="#textarea" rows="3">{{old('Solution')}}</textarea>
  </div>


  </div>


  </div>

  </div>
  <div class="row">
  <div class="col-md-6">
  <h4>Yes</h4>
  <textarea name="yes[]" style="width: 100%" id="#textarea" rows="5"></textarea>

  </div>

  <div class="col-md-6">
  <h4>No</h4>
  <textarea name="no[]" style="width: 100%" id="#textarea" rows="5"></textarea>
  </div>
  </div>
  <br>
  <a id="nextlayout"></a>
  <div class="text-center"><button id="clickme" onclick="next(1)" type="button">Next Option</button></div>
  

  </form>
  <!--end::Form-->

  </div>
  </div>
  </div>
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