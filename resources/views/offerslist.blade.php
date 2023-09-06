@extends("layouts.app3")
@section('content')
<style>
p{
  float : left;
}
.before{
  font-weight : bold;
  font-size : 35px;
  display :inline;


}
.after{
  padding-left:20px;
  display :inline;

}
  </style>

  <h1 style="margin-top:50px;" class="text-center"> Our Offers </h1>
@foreach($ev as $e)

    <div class="nopadding row">
<div class="nopadding col-sm-10 text-center ato">
    <a href="#">
    <div name="{{$e->name}}" id="{{$e->name}}" class="col-sm-12 rel">
    
    <img class="fl nono" src="{{asset('public/file/'.$e->img)}}" />
    <img class="fl nono"  src="{{asset('public/file/'.$e->img2)}}" />
    <img  class="fl nono" src="{{asset('public/file/'.$e->img3)}}" />
    <h1 class="cath1 text-left">{{Lang::locale()=="en"?$e->name_en:$e->name}}</h1>
    <p class="cath1 text-left col-lg-12">{{Lang::locale()=="en"?$e->desc_en:$e->desc}}</p>
    <p class='before text-left'>{{$e->beforeprice}}    </p>
    <p class="after text-left"> {{$e->price}}  {{__('message.curr')}} </p>

    </div>
</a>  
    </div>
        </div>
        @endforeach

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Darkmode.js/1.0.1/darkmode-js.min.js"></script>
    <script src="{{asset('dist/code.jquery.com_jquery-3.7.0.js')}}"></script>

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
  $(document).ready(function(){
    $("#srch").keyup(function(){
            var menu = $(".menu");
            menu.css("display","none");
            menu.each(function(){
            if($(this).attr('name').indexOf($("#srch").val()) != -1){
                    $(this).css("display","block");
            }
            
        })
    })
    })
</script>
@endsection