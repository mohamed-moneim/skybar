<html>
      <head>
<!-- Custom CSS -->
  <style>
    table,th,tr,td{
        border:none !important;
    }
    table{
        margin:70px auto;
    }
</style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="{{asset('public/dist/style.css')}}" rel="stylesheet">
    <title>Sky Bar </title>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href="{{asset('dist/bootstrap.min.css')}}" rel="stylesheet">


</head>

<body id="page-top" class="index">
<!-- Navigation -->
<a href="{{route('profile',Session::get('restid'))}}">
<img class="backbutton" src="{{asset('public/dist/img/back.png')}}" />
    </a>
@yield("content")
<!-- Footer -->
    
    <script src="{{asset('public/dist/code.jquery.com_jquery-3.7.0.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('public/dist/bootstrap.min.js')}}"></script>
    <!-- Contact Form JavaScript -->

    <!-- Custom Theme JavaScript -->

</body>

    </html>