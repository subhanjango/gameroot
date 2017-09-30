
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
     // codes works on all bootstrap modal windows in application
    $('#myUsers').on('hidden.bs.modal', function(e)
    { 
        $('#users').html("");
    }) ;
   $('#datatable').dataTable( {
  "ordering": false,
    "stateSave": true
} );

    $("#select2").select2({
  allowClear:true
});

});
	setTimeout(function(){
    $('#error').toggle();
}, 5000);

  function getGroupMembers(groupID){
    url = $('#getGroupURL').val();
    dataItems = "";
  $.ajax({
    url : url,
    type: "POST",
  data : 'id='+groupID,
    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
  dataType: 'json', // ** ensure you add this line **
    success: function(data) {
      for (var i = data.length - 1; i >= 0; i--) {
        $('#users').append('<li>'+data[i][0].email+'</li>');
      }
      $('#heading').html('Group Members');
      $('#myUsers').modal();
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
        alert("some error");
    }
});
  } 

   function getSubCategories(groupID){
    url = $('#getCategoryURL').val();
    dataItems = "";
  $.ajax({
    url : url,
    type: "POST",
  data : 'id='+groupID,
    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
  dataType: 'json', // ** ensure you add this line **
    success: function(data) {
      /*console.log(data);*/
      for (var i = data.length - 1; i >= 0; i--) {
        $('#users').append('<li>'+data[i].title+'</li>');
      }
      $('#heading').html('Sub Categories');
      $('#myUsers').modal();
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
        alert("some error");
    }
});
  }

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

 
}

 





function next(id){
 
var n = id;
$('#nextlayout').append('<div class="row"> <div class="col-md-6"> <h4>Yes</h4> <textarea style="width: 100%" name="yes[]" id="'+n+'" rows="5"></textarea></div><div class="col-md-6"><h4>No</h4><textarea name="no[]"  style="width: 100%" id="'+n+'" rows="5"></textarea></div></div><br>');
n++;
$('#clickme').replaceWith('<button id="clickme" onclick="next('+n+')" type="button">Next Option</button>');

tinymce.init({
  selector: 'textarea',
  height: 300,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });

}

 tinymce.init({
  selector: 'textarea',
  height: 300,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });


</script>