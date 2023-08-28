@extends("layouts.app3")
@section('content')


    <div class="main-search-container" data-background-image="https://demo.food-bank.xyz/frontend/images/default/bg.jpg" style="background-image: url(&quot;https://demo.food-bank.xyz/frontend/images/default/bg.jpg&quot;);">
        <div class="main-search-inner">
            <div class="container-fluid custom-container">
                <div class="row no-margin-row">
                    <div class="col-lg-6">
                        <form method="GET" action="{{route('getrest')}}">

                            <h2 class="header_title">
                                سكاي بار هو دليل المطاعم و المقاهي السعودية و افضل العروض داخل السعودية
                            </h2>
                            <h2 class="title_responsive">افضل دليل للمطاعم و المقاهي !</h2>
                            <h4 class="subtitle">استكشف افضل العروض من افضل الاماكن</h4>
                            <input name="name" style="direction:rtl" class="form-control p" type="text" placeholder="بحث" />
                                <button class="btn btn-primary p " type="submit">ذهاب</button>
                        </form>
                        </div>
                        </div>
          
            </div>
        </div>

</div>

@endsection