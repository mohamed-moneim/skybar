@extends("layouts.app3")
@section('content')

<div class="nopadding row">
<div class="nopadding col-lg-12 rel">
    
    <img class="cover" src="{{asset('file/'.$rest->coverpic)}}" alt="coverphoto" />
    <img class="logo2" src="{{asset('file/'.$rest->profilepic)}}" alt="logo" />
    <a href="{{route('setlang','ar')}}"><img src="{{asset('dist/img/ksa.png')}}" class="lang" /></a>
    <a href="{{route('setlang','en')}}"><img src="{{asset('dist/img/english.png')}}" class="lang" /></a>
    </div>

    </div>
   <div class="pdngtop row">
<div class="nopadding col-lg-12 text-center">
<a href="{{route('setlang','ar')}}"><img src="{{asset('dist/img/ksa.png')}}" class="lang2" /></a>
    <a href="{{route('setlang','en')}}"><img src="{{asset('dist/img/english.png')}}" class="lang2" /></a> 
    <h1 class="text-center">{{$rest->name}}</h1>
    <button class="btn btn2 btn-primary text-center"  data-toggle="modal" data-target="#exampleModal">Register</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Subscribe to this Restautrant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{route('adduser')}}">
            @csrf
             <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input name="name" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your  name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input name="email" required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Mobile</label>
    <input name="mob" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Mobile">
  </div>
  <input type="hidden" name="rid" value="{{$rest->id}}" />
  <div class="form-group">

  <button type="submit" class="btn btn-primary sbmt">Submit</button>
</div>
</form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
    
    <div class="nopadding col-lg-12 text-center"> 

               <a target="_blank" href="https://wa.me/{{$rest->mobile}}"><img class="nopadding social2" src="{{asset('dist/img/whats.png')}}" />
</a>
<a target="_blank" href="tel:{{$rest->mobile}}"> <img class="nopadding social2" src="{{asset('dist/img/telephone-call.png')}}" />
</a>
<a href="{{route('down',$rest->id)}}"> <img class="nopadding social2" src="{{asset('dist/img/contacts.png')}}" /></a>

    
        </div>
        </div>

    </div>
    <div class="pdngtop2 container">
<div class="row">
@if($rest->type=="restuarant")
@if($setting->food)
        <div class="col-lg-3">

        <a href="{{route('menu',['id'=>$rest->id,'type'=>'food'])}}">
          <img class="nopadding fl" src="{{asset('dist/img/cutlery.png')}}" />
            <h3  class="text-center">Menu</h3>
            </a>

          </div>
          @endif
          @if($setting->bar)

          <div class="col-lg-3">
          <a href="{{route('barmenu',['id'=>$rest->id,'type'=>'bar'])}}">
            <img class="nopadding fl" src="{{asset('dist/img/cocktail.png')}}" />
                        <h3  class="text-center">Bar</h3>
                        </a>
        </div>
        @endif


        @endif
        @if($rest->type=="cafe")
        @if($setting->bar)

        <div class="col-lg-3">
        <a href="{{route('barmenu',['id'=>$rest->id,'type'=>'bar'])}}">

            <img class="nopadding fl" src="{{asset('dist/img/cocktail.png')}}" />
                        <h3  class="text-center">Bar</h3>
                        </a>

        </div>
        @endif
        @if($setting->shisha)
  
        <div class="col-lg-3">
        <a href="{{route('shishamenu',['id'=>$rest->id,'type'=>'shisha'])}}">

            <img class="nopadding fl" src="{{asset('dist/img/cocktail.png')}}" />
                        <h3  class="text-center">Shisha</h3>
                        </a>

        </div>
        @endif
        @endif
        @if($rest->type=="caferest")
        @if($setting->food)

        <div class="col-lg-3">
        <a href="{{route('menu',['id'=>$rest->id,'type'=>'food'])}}">

            <img class="nopadding fl" src="{{asset('dist/img/cutlery.png')}}" />
            <h3  class="text-center">Menu</h3>
            </a>
          </div>
          @endif     
             @if($setting->bar)

        <div class="col-lg-3">
        <a href="{{route('barmenu',['id'=>$rest->id,'type'=>'bar'])}}">
        
            <img class="nopadding fl" src="{{asset('dist/img/cocktail.png')}}" />
                        <h3  class="text-center">Bar</h3>
                        </a>
        @endif
        @if($setting->shisha)

        <div class="col-lg-3">
        <a href="{{route('shishamenu',['id'=>$rest->id,'type'=>'shisha'])}}">

        <img class="nopadding fl" src="{{asset('dist/img/cocktail.png')}}" />
                    <h3  class="text-center">Shisha</h3>
                    </a>
    </div>
    @endif

    @endif
    @if($setting->event)

        <div class="col-lg-3">
        <a href="{{route('eventslist',$rest->id)}}">

            <img class="nopadding fl" src="{{asset('dist/img/event.png')}}" />
                        <h3   class="text-center">Events</h3>
</a>
        </div> 
@endif
@if($setting->offer)

        <div class="col-lg-3">
        <a href="{{route('offerslist',$rest->id)}}">

            <img class="nopadding fl" src="{{asset('dist/img/gift.png')}}" />
                        <h3 class="text-center">Offers</h3>
</a>
    </div>
    @endif
</div>
</div>
<div class="pdngtop2 row">
<div class="nopadding col-lg-12 text-center">
            <h3 class="text-center">Follow Us on Social Media</h3>
            @foreach($soc as $s)
            <a target="_blank" href="{{$s->url}}">
            <img class="nopadding social" src="{{asset('public/file/'.$s->img)}}" />
</a>  
@endforeach
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
</script>
@endsection