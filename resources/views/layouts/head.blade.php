<!DOCTYPE html><!-- 
<html lang="en" >
<!-- begin::Head -->
<head>
<meta charset="utf-8" />
<title>
{{$Title or 'Welcome' }}
</title>
<meta name="description" content="Latest updates and statistic charts">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--begin::Web font -->
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script>
WebFont.load({
google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
active: function() {
sessionStorage.fonts = true;
}
});
</script>
<script src="{{URL::to('tinymce/tinymce.min.js')}}"></script>
<!--end::Web font -->
<!--begin::Base Styles -->
<link href="{{URL::to('/assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::to('assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<!--end::Base Styles -->
<link rel="shortcut icon" href="{{URL::to('assets/demo/default/media/img/logo/favicon.ico')}}" />
</head>
