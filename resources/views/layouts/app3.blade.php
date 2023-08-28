<html>
      <head>
<!-- Custom CSS -->
    <link href="{{asset('dist/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="{{asset('dist/cdn.datatables.net_1.13.6_css_jquery.dataTables.min.css')}}" rel="stylesheet">
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
</head>

<body id="page-top" class="index">
<!-- Navigation -->
    <nav class="navbar navbar-default navbar-color navbar-fixed-top nopaddpmargin text-center">
            <div class="clogo text-center">
            <a href="{{route('profile',Session::get('restid'))}}">
<img class="logo" src="{{asset('img/skybarlogo.png')}}" />
    </a>
<!--
<ul class="menulinks nav navbar-nav">
                    <li class="page-scroll">
                        <a href="/#page-top">
                        {{ LaravelLocalization::getCurrentLocale() }}

                        {{__('message.rest')}}      
                        </a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">مطاعم</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio">كافيهات</a>
                    </li>
                            <li class="page-scroll">
                        <a href="#contact">اتصل بنا</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">من نحن </a>
                    </li>
             
                </ul>
    -->
            <!-- Collect the nav links, forms, and other content for toggling -->
              
            </div>
            <!-- /.navbar-collapse -->
        <!-- /.container-fluid -->
    </nav>
    @yield('content')
    <!-- Footer -->
    
    <script src="{{asset('dist/code.jquery.com_jquery-3.7.0.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('dist/bootstrap.min.js')}}"></script>
    <!-- Contact Form JavaScript -->

    <!-- Custom Theme JavaScript -->

</body>

    </html>