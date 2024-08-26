<!DOCTYPE html>
<html lang="zxx">


<head>
 
 @include('backend.include.head')



</head>
<body class="crm_body_bg">


@include('backend.include.sidebar')



@include('backend.include.topbar')


  @yield('content')

@include('backend.include.footer')


@include('backend.include.script')


</body>

</html>