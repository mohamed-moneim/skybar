@extends("layouts.app3")
@section('content')
<style>
.uldiv{
    margin : 40px auto;
}
li{
    display : inline;
}
li a {
    color : white;
    padding: 15px;
    margin : 20px;
    text-decoration : none !important;
    background-color : #cf6135;
    border-radius : 15px;
}
a : hover{
    text-decoration : none !important;
    color : black;


}

.nav-tabs {
    border-bottom: 0px solid #dee2e6;
}
.nav{
    display : block;
}
.tab-content{
    margin-top:100px;
}
.gry{
    color : #303132;
}
svg{
width:20px;
}
a:hover{
    color:white;
}
.actv{
    color : black;
    background-color:white;
}
</style>
<div class="nopadding  text-center">
    <div class="uldiv col-lg-6 text-center ato">
        <ul  class="nav nav-tabs ato">
<li class="active"><a data-toggle="tab"  class="tab" href="#new">New Events</a></li>
<li><a data-toggle="tab"  class="tab" href="#old">Old Events</a></li>
</ul>
</div>
<div class="tab-content ato">
  <div id="new"  class="tab-pane fade show
  @if(!isset($_GET['page']))
  {{'active'}}
  @endif
  col-sm-10 ato">
  @if(count($ev)>0)

@foreach($ev as $e)
    <a href="{{route('getevent',['id'=>$e->id])}}">
    <div name="{{$e->name}}" id="{{$e->name}}" class="menu col-lg-12 text-center rel" style="background-image:url({{asset('public/file/'.$e->img)}});background-size: cover;
">
     <div class="black" >
        </div>
        <h1 class="absh2">{{Lang::locale()=="en"?$e->name_en:$e->name}}</h1>
    </div>
</a>  
@endforeach

@else
<h3 class="gry">لا يوجد</h3>

@endif
</div>
<div id="old" class="tab-pane fade show col-sm-10 ato
@if(isset($_GET['page']))
  {{'active'}}
  @endif
"> 
@if(count($old)>0)
@foreach($old as $f)
<section class="col-lg-12">
    <a href="{{route('getevent',['id'=>$f->id])}}">
    <div name="{{$f->name}}" id="{{$f->name}}" class="menu col-lg-12 text-center rel" style="background-image:url({{asset('public/file/'.$f->img)}});background-size: cover;
">
     <div class="black" >
        </div>
        <h1 class="absh2">{{Lang::locale()=="en"?$f->name_en:$f->name}}</h1>
    </div>
</a></section>
    @endforeach

    @else
    <h3 class='gry'>لا يوجد</h3>

    @endif
    <div style="padding-top:50px;" class="col-lg-12">{!! $old->links() !!}
</div>
    </div>

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
    $("li a").click(function(){
        if($(this).hasClass("actv")){
            $(this).removeClass("actv")
        }else{
            $(this).addClass("actv")
        }
    })
    })
    
</script>
@endsection