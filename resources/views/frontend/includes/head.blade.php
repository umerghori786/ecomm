<head>
    <meta charset="utf-8">
    <title>Kabira</title>
    <meta name="description" content="Morden Bootstrap HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" @if(isset($logo))  href="{{url('logo/'.$logo->image)}}" @else href="{asset('dashboard/img/logo.png')}}"  @endif type="image/png">
      
    <!-- ======= All CSS Plugins here ======== -->
    <link rel="stylesheet" href="{{asset('newtheme/assets/css/plugins/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('newtheme/assets/css/plugins/glightbox.min.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Plugin css -->
    <!-- <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- tailwind css -->
    

    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="{{asset('newtheme/assets/css/style.css')}}">
    <style type="text/css">
        .swal2-popup {
            font-size: 18px !important;
        }

        .swal2-styled {
            padding: 10px 32px 10px 32px !important;
            margin: 20px 10px 0px 10px !important;
            width: 170px;
            height: 45px;
        }
        .colored-toast.swal2-icon-success {
          background-color: #a5dc86 !important;
        }
        .user-short-name {
            height: 50px;
            width: 50px;
            background-color: #2d2f31;
            border-radius: 50%;
            line-height: 50px;
            text-align: center;
            color: #fff;
            font-weight: 900;
            font-size: 20px;
            text-transform: uppercase;
            margin-right: 20px;
        }
    </style>

    <script  type="text/javascript" src="https://js.stripe.com/v3/"></script>  
</head>



