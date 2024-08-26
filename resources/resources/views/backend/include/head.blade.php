
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>{{config('app.name')}}</title>
<link rel="icon" @if(isset($logo))  href="{{asset('logo/'.$logo->image)}}" @else href="{asset('dashboard/img/logo.png')}}"  @endif type="image/png">

<link rel="stylesheet" href="{{asset('dashboard/css/bootstrap1.min.css')}}" />

<link rel="stylesheet" href="{{asset('dashboard/vendors/themefy_icon/themify-icons.css')}}" />

<link rel="stylesheet" href="{{asset('dashboard/vendors/swiper_slider/css/swiper.min.css')}}" />

<link rel="stylesheet" href="{{asset('dashboard/vendors/select2/css/select2.min.css')}}" />

<link rel="stylesheet" href="{{asset('dashboard/vendors/niceselect/css/nice-select.css')}}" />

<link rel="stylesheet" href="{{asset('dashboard/vendors/owl_carousel/css/owl.carousel.css')}}" />

<link rel="stylesheet" href="{{asset('dashboard/vendors/gijgo/gijgo.min.css')}}" />

<link rel="stylesheet" href="{{asset('dashboard/vendors/font_awesome/css/all.min.css')}}" />
<link rel="stylesheet" href="{{asset('dashboard/vendors/tagsinput/tagsinput.css')}}" />

<link rel="stylesheet" href="{{asset('dashboard/vendors/datatable/css/jquery.dataTables.min.css')}}" />
<link rel="stylesheet" href="{{asset('dashboard/vendors/datatable/css/responsive.dataTables.min.css')}}" />
<link rel="stylesheet" href="{{asset('dashboard/vendors/datatable/css/buttons.dataTables.min.css')}}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<link rel="stylesheet" href="{{asset('dashboard/vendors/text_editor/summernote-bs4.css')}}" />

<link rel="stylesheet" href="{{asset('dashboard/vendors/morris/morris.css')}}">

<link rel="stylesheet" href="{{asset('dashboard/vendors/material_icon/material-icons.css')}}" />

<link rel="stylesheet" href="{{asset('dashboard/css/metisMenu.css')}}">

<link rel="stylesheet" href="{{asset('dashboard/css/style1.css')}}" />
<link rel="stylesheet" href="{{asset('dashboard/css/colors/default.css')}}" id="colorSkinCSS">
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>