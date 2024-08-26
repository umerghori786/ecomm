<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Kabira</title>
  <meta name="description" content="Morden Bootstrap HTML5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="{{asset('newtheme/image/x-icon')}}" href="{{asset('newtheme/assets/img/favicon.ico')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    
   <!-- ======= All CSS Plugins here ======== -->
  <link rel="stylesheet" href="{{asset('newtheme/assets/css/plugins/swiper-bundle.min.css')}}">
  <link rel="stylesheet" href="{{asset('newtheme/assets/css/plugins/glightbox.min.css')}}">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&amp;display=swap" rel="stylesheet">

  <!-- Plugin css -->
  <!-- <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css"> -->
  
  <!-- Custom Style CSS -->
  <link rel="stylesheet" href="{{asset('newtheme/assets/css/style.css')}}">

  @vite('resources/css/app.css')
</head>
<body>
	<div id="app"></div>




	@vite('resources/js/app.js')

	<!-- All Script JS Plugins here  -->
  <!-- <script src="assets/js/vendor/popper.js" defer="defer"></script> -->
  <!-- <script src="assets/js/vendor/bootstrap.min.js" defer="defer"></script> -->

  <script src="{{asset('newtheme/assets/js/plugins/swiper-bundle.min.js')}}" defer="defer"></script>
  <script src="{{asset('newtheme/assets/js/plugins/glightbox.min.js')}}" defer="defer"></script>

  <!-- Customscript js -->
  <script src="{{asset('newtheme/assets/js/script.js')}}" defer="defer"></script>
  
</body>
</html>