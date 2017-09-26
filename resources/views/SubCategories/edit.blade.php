@include('layouts.head')
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
                  <input type="hidden" name="edit_id" value="{{$SubCategories->id}}">
                  <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                      <div class="form-group m-form__group">
                        <label>
                          Title:
                        </label>
                        <input type="text" value="{{$SubCategories->title}}" name="title" class="form-control m-input" placeholder="Enter title">
                        <span class="m-form__help">
                        </span>
                        <label>
                           Category:
                        </label>
                         <select name="category" class="form-control m-input">
                          <option>Select Category</option>
                          @foreach($categories as $categories)
                          @if($SubCategories->category_id == $categories->id)
                          <option selected value="{{$categories->id}}">{{$categories->title}}</option>
                          @else
                          <option value="{{$categories->id}}">{{$categories->title}}</option>
                          @endif
                          @endforeach
                        </select>
                      </div>
                   </div>
                </div>
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
