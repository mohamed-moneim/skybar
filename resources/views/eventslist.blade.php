@extends("layouts.app3")
@section('content')

    <div class="nopadding row">
<div class="nopadding col-lg-12 text-center">
@foreach($ev as $e)
    <a href="{{route('getevent',['id'=>$e->id])}}">
    <div name="{{$e->name}}" id="{{$e->name}}" class="menu col-lg-12 text-center rel">
    <img class="fl col-lg-12" src="{{asset('public/file/'.$e->img)}}" />
        <h1 class="cath1">{{$e->name}}</h1>
    </div>
</a>  
    @endforeach
    </div>
        </div>
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