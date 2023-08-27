<!DOCTYPE html>
<html>

@include('frontend.includes.head')

<body>

@include('frontend.includes.header')

@yield('content')


@include('frontend.includes.footer')


@include('frontend.includes.script')

@stack('script')
</body>
</html>