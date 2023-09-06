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
    .load{
        position: absolute;
        height : 100vh;
    }
    .loadimg{
        display: block;
  margin-left: auto;
  margin-right: auto;
  position: relative;
  top:30%;
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

</head>

<body id="page-top" class="index">
    <div class="load col-lg-12">
    <img class="loadimg col-sm-6 col-md-6 col-lg-3" src="{{asset('public/file/'.$rest->profilepic)}}" alt="coverphoto" />


    </div>
<!-- Navigation -->

@yield("content")
<!-- Footer -->
    
    <script src="{{asset('public/dist/code.jquery.com_jquery-3.7.0.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('public/dist/bootstrap.min.js')}}"></script>
    <!-- Contact Form JavaScript -->

    <!-- Custom Theme JavaScript -->
<script>

$(document).ready(function(){
    $(".contner").css("display","none");
    setTimeout(() => {
        $(".contner").css("display","block");
        $(".load").css("display","none");

    }, 2000);

})
</script>
</body>

    </html>