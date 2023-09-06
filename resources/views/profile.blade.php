@extends("layouts.app4")
@section('content')
<div class='contner'>
<div class="nopadding rel">
    <?php
    $imgs = explode(",", $rest->coverpic);
    ?>
    @foreach($imgs as  $i)

    <img class="cover fade" src="{{asset('public/file/'.$i)}}" alt="coverphoto" />
    @endforeach
    <img class="logo2" src="{{asset('public/file/'.$rest->profilepic)}}" alt="logo" />
    <a href="{{route('setlang','ar')}}"><img src="{{asset('dist/img/ksa.png')}}" class="lang" /></a>
    <a href="{{route('setlang','en')}}"><img src="{{asset('dist/img/english.png')}}" class="lang" /></a>
    </div>

   <div class="pdngtop row">
<div class="nopadding col-lg-12 text-center prof">
<a href="{{route('setlang','ar')}}"><img src="{{asset('dist/img/ksa.png')}}" class="lang2" /></a>
    <a href="{{route('setlang','en')}}"><img src="{{asset('dist/img/english.png')}}" class="lang22" /></a> 
    <h1 class="text-center restname">{{Lang::locale()=="en"?$rest->name_en:$rest->name}}</h1>
    <button class="btn btn2 btn-primary text-center"  data-toggle="modal" data-target="#exampleModal">Register</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('message.subscribe')}} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{route('adduser')}}">
            @csrf
             <div class="form-group text-left">
    <input name="name" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" {{__('message.name')}} " >
  </div>
  <div class="form-group text-left">
    <input name="email" required type="email" placeholder="{{__('message.email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
  </div>
  <div class="form-group text-left">
    <input name="mob" required type="text" class="form-control" placeholder="{{__('message.mobile')}}" id="exampleInputEmail1" aria-describedby="emailHelp" >
  </div>
  <input type="hidden" name="rid" value="{{$rest->id}}" />
  <div class="form-group">

  <button type="submit" class="btn btn-primary col-lg-12 sbmt">    {{__('message.register')}}      </button>
</div>
</form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
    
    <div class="nopadding col-lg-12 text-center"> 

               <a class="cl" target="_blank" href="https://wa.me/{{$rest->mobile}}"><img class="nopadding social2" src="{{asset('dist/img/whats.png')}}" />
</a>
<a class="cl"  target="_blank" href="tel:{{$rest->mobile}}"> <img class="nopadding social2" src="{{asset('dist/img/telephone-call.png')}}" />
</a>
<a class="cl"  href="{{route('down',$rest->id)}}"> <img class="nopadding social2" src="{{asset('dist/img/contacts.png')}}" /></a>

    
        </div>
        </div>

    </div>
    <div class="row grey">

    <div class="pdngtop2 container">
<div class="row">
@if($rest->type=="restuarant")
@if($setting->food)
        <div class="col-sm-3">

        <a href="{{route('menu',['id'=>$rest->id,'type'=>'food'])}}">
          <img class="nopadding fl2" src="{{asset('dist/img/cutlery.png')}}" />
            <h3  class="text-center ttl">{{__('message.menu')}} </h3>
            </a>

          </div>
          @endif
          @if($setting->bar)

          <div class="col-sm-3">
          <a href="{{route('barmenu',['id'=>$rest->id,'type'=>'bar'])}}">
            <img class="nopadding fl2" src="{{asset('dist/img/cocktail.png')}}" />
                        <h3  class="text-center ttl">{{__('message.bar')}} </h3>
                        </a>
        </div>
        @endif


        @endif
        @if($rest->type=="cafe")
        @if($setting->bar)

        <div class="col-sm-3">
        <a href="{{route('barmenu',['id'=>$rest->id,'type'=>'bar'])}}">

            <img class="nopadding fl2" src="{{asset('dist/img/cocktail.png')}}" />
                        <h3  class="text-center ttl">{{__('message.bar')}} </h3>
                        </a>

        </div>
        @endif
        @if($setting->shisha)
  
        <div class="col-sm-3">
        <a href="{{route('shishamenu',['id'=>$rest->id,'type'=>'shisha'])}}">

            <img class="nopadding fl2" src="{{asset('dist/img/cocktail.png')}}" />
                        <h3  class="text-center ttl">{{__('message.shisha')}} </h3>
                        </a>

        </div>
        @endif
        @endif
        @if($rest->type=="caferest")
        @if($setting->food)

        <div class="col-sm-3">
        <a href="{{route('menu',['id'=>$rest->id,'type'=>'food'])}}">

            <img class="nopadding fl2" src="{{asset('dist/img/cutlery.png')}}" />
            <h3  class="text-center ttl">{{__('message.menu')}} </h3>
            </a>
          </div>
          @endif     
             @if($setting->bar)

        <div class="col-sm-3">
        <a href="{{route('barmenu',['id'=>$rest->id,'type'=>'bar'])}}">
        
            <img class="nopadding fl2" src="{{asset('dist/img/cocktail.png')}}" />
                        <h3  class="text-center ttl">{{__('message.bar')}} </h3>
                        </a>
        @endif
        @if($setting->shisha)

        <div class="col-sm-3">
        <a href="{{route('shishamenu',['id'=>$rest->id,'type'=>'shisha'])}}">

        <img class="nopadding fl2" src="{{asset('dist/img/cocktail.png')}}" />
                    <h3  class="text-center ttl">{{__('message.shisha')}} </h3>
                    </a>
    </div>
    @endif

    @endif
    @if($setting->event)

        <div class="col-sm-3">
        <a href="{{route('eventslist',$rest->id)}}">

            <img class="nopadding fl2" src="{{asset('dist/img/event.png')}}" />
                        <h3   class="text-center ttl">{{__('message.event')}} </h3>
</a>
        </div> 
@endif
@if($setting->offer)

        <div class="col-sm-3">
        <a href="{{route('offerslist',$rest->id)}}">

            <img class="nopadding fl2" src="{{asset('dist/img/gift.png')}}" />
                        <h3 class="text-center ttl">{{__('message.offer')}} </h3>
</a>
    </div>
    @endif
</div>
</div>

</div>
<div class="row grey">
<div class="nopadding col-lg-12 text-center">
            <h3 class="text-center">{{__('message.social')}} </h3>
            @foreach($soc as $s)
            <a target="_blank" href="{{$s->url}}">
            <img class="nopadding social" src="{{asset('file/'.$s->img)}}" />
</a>  
@endforeach
</div>
</div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Darkmode.js/1.0.1/darkmode-js.min.js"></script>
<script>
const options = {
  bottom: '20px', // default: '32px'
  right: '20px', // default: '32px'
  left: 'unset', // default: 'unset'
  time: '0.5s', // default: '0.3s'
  mixColor: '#fff', // default: '#fff'
  backgroundColor: '#fff',  // default: '#fff'
  buttonColorDark: '#100f2c',  // default: '#100f2c'
  buttonColorLight: '#fff', // default: '#fff'
  saveInCookies: false, // default: true,
  label: '🌓', // default: ''
  autoMatchOsTheme: true // default: true
}
  function addDarkmodeWidget() {
    new Darkmode().showWidget();
  }
  window.addEventListener('load', addDarkmodeWidget);
  let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("cover");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
@endsection