
</div>

<!-- end:: Page -->
<!-- begin::Quick Sidebar -->

<!-- end::Quick Sidebar -->
<!-- begin::Scroll Top -->

<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
<i class="la la-arrow-up"></i>

</div>
<!-- end::Scroll Top -->
<!-- begin::Quick Nav -->

<!-- begin::Quick Nav -->
<!--begin::Base Scripts -->
<script src="{{URL::to('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
<!--end::Base Scripts -->
<!--begin::Page Snippets -->
<script src="{{URL::to('assets/app/js/dashboard.js')}}" type="text/javascript"></script>

<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
   $('#datatable').dataTable( {
  "ordering": false,
    "stateSave": true
} );
});
	setTimeout(function(){
    $('#error').toggle();
}, 5000);

	function changestatus(id){
	url = $('#status_url').val();
	$.ajax({
    url : url,
    type: "POST",
	data : 'id='+id,
    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
    success: function(data)
    {
     console.log(data);
	}
});

  tinymce.init({ selector:'#textarea' });
}

</script>