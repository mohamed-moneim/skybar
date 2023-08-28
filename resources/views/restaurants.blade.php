@extends("layouts.app2")
@section('content')

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-color navbar-fixed-top nopaddpmargin">
        <div class="container nopaddpmargin">
            <div class="clogo">
<img class="logo" src="img/skybarlogo.png" />
</div>
<ul class="menulinks nav navbar-nav">
                    <li class="page-scroll">
                        <a href="/#page-top">الرئيسية</a>
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
            <!-- Collect the nav links, forms, and other content for toggling -->
              
            </div>
            <!-- /.navbar-collapse -->
        <!-- /.container-fluid -->
    </nav>

    <div class="cont">
    <div class="col-lg-12">
@foreach($rest as $r)
<div class="col-lg-4">
    <a href="{{route('profile',$r->id)}}">
<img class="col-lg-12" src="public/file/{{$r->profilepic}}" />
<h6 class="text-center p">{{$r->name}}</h6>
</a>
</div>
@endforeach
</div>
</div>

    <!-- Footer -->
    <footer style="margin:50px 0px;" class="text-center">
        <div class="footer-above">
        <h2>بيانات الإتصال </h2>

            <div class="container">
                <div class="row">
                    <div class="footer-col col-lg-4">
                        <img class="col-lg-12 logo text-right" src="img/skybarlogo.png"
                        />
                        <p>
                            سكاي بار هو افضل دليل للمطاعم و المقاهي داخل المملكة العربية السعودية و هو ايضاً دليل لافضل عروض داخل المطاعم و الحفلات و المناسبات 
                        </p>
                    </div>
                    
                    <div class="footer-col col-lg-4">
                        <ul class="list-inline">
                        <p>يسعدنا تواصلكم معنا عبر جميع قنوات الإتصال </p>

                            <li>
                            
                                <a href="tel://+" class="btn-social btn-outline" alt="My Phone number" 
                                title="+9652342343234">
                                    <i class="fa fa-fw fa-phone" aria-hidden="true"></i>
                                    <span class="sr-only"> رقم الجوال اتصل بنا الآن </span>
                                </a>
                            </li>
                            <li>
                                <a href="@gmail.com" class="btn-social btn-outline" alt="My E-mail ID" 
                                title="My E-mail ID">
                                    <i class="fa fa-fw fa-envelope" aria-hidden="true"></i>
                                    <span class="sr-only">البريد الإلكتروني</span>
                                </a>
                            </li>
                    
                            <li>
                                <a href="https://www.facebook.com/profile.php?i" target="_blank" class="btn-social btn-outline" alt="Behance" title="Behance">
                                <i class="fa-brands fa-facebook-f" aria-hidden="true"></i>
                                    <span class="sr-only">Facebook</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://api.whatsapp.com/send?phone=?&text=%D8%A7%D9%84%D8%B3%D9%84%D8%A7%D9%85%20%D8%B9%D9%84%D9%8A%D9%83%D9%85%20%D8%A7%D8%AD%D8%AA%D8%A7%D8%AC%20%D8%A7%D9%84%D9%8A%20%D9%81%D9%86%D9%8A%20%D8%B5%D9%8A%D8%A7%D9%86%D8%A9" target="_blank" class="btn-social btn-outline" alt="Codepen" title="Codepen">
                                    <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                                    <span class="sr-only">Whatsapp</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com//" target="_blank" class="btn-social btn-outline" 
                                alt="instagram" title="instagram">
                                <i class="fa-brands fa-instagram" aria-hidden="true"></i>
                                    <span class="sr-only">Instagram</span>
                                </a>
                            </li>
                        </ul>
                </div>
                <div class="footer-col col-lg-4">
                    <ul class="list-inline">
                            <li>
                            <a class="fanchor" href="#myLike">الرئيسية</a>

                            </li>
                            <li>
                            <a class="fanchor" href="#myLikes">مطاعم  </a>

                            </li>
                            <li>
                            <a class="fanchor" href="#myLikes">كافيهات  </a>

                            </li>
                            <li>
                            <a class="fanchor" href="#myLikes">اتصل بنا </a>

                            </li>
                            <li>
                            <a class="fanchor" href="#myLikes">من نحن </a>

                            </li>
                    </div>
                </div>

            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    تمت البرمجة بواسطة  <a href="https://www.skytechegypt.com" target="_blank">skytechegypt.com</a>
                        <br>
                        حقوق النشر محفوظة &copy; skybar.com 2023
                    </div>
                </div>
            </div>
        </div>
    </footer>
