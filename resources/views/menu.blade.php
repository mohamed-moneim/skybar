@extends("layouts.app3")
@section('content')



<style>
nav ul {
  padding: 0;
  padding-left : 150px;
  padding-top : auto;
}

nav li {
  list-style: none;
  display : inline-block;
}

nav li a {
  color: white;
  font-weight: 600;
  transition: all ease-out 250ms;
}
.active {
  color: black; 
}
.infscroll{
  min-height:150px;
  position: fixed;
  z-index: 100000000000000000;
}
.catimg{
  height:70px;
}
.ato{
  padding-top:150px;
}
.lnks{
  width:100%;}
</style>

<nav  id="infscroll"  class="col-lg-12 nopadding color text-left infscroll">
<ul id="mainNav">
<?php 
    $x = 0;
    ?>
@foreach($cats as $cc)


<li>
<a  class='lnks<?php
if($x==0){
echo " active";
}
$x++;
?>

' href="#{{$cc->name}}">
<div style="width:100px;">
<img class='catimg' style="width:100%;padding:10px;" src="{{asset('public/file/'.$cc->img)}}" />



<h6 class="text-center" style="padding-top:10px;">{{Lang::locale()=="en"?$cc->name_en:$cc->name}}</h6>
</div>
</a></li>

@endforeach


    </ul>
</nav>

    <div class="nopadding row">

<div  id="ato" class="nopadding col-lg-9 text-center ato">
<form class="pdn">
    
    <input id="srch" type="text" class="col-lg-12 form-control" placeholder="Search" />
    </form>

@foreach($cats as $cc)
<section class="col-lg-12" id="{{$cc->name}}">
    <?php
    $x++;
    ?>

<div  style="margin:0px auto;">
    <a  href="{{route('getitemsbycat',['id'=>$cc->id,'type'=>$type])}}">
    <div name="{{$cc->name}}" id="{{$cc->name}}" class="menu col-lg-12 nopadding  text-center rel" style="background-image:url({{asset('public/file/'.$cc->img)}});background-size: cover;
">
        <div class="black" >
        </div>
        <h1 class="absh2">{{Lang::locale()=="en"?$cc->name_en:$cc->name}}</h1>

    </div>
</a>  
</div>
</section>
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
<script>

const sections = document.querySelectorAll("section[id]");

// Add an event listener listening for scroll
window.addEventListener("scroll", navHighlighter);

function navHighlighter() {
  
  // Get current scroll position
  let scrollY = window.pageYOffset;
  
  // Now we loop through sections to get height, top and ID values for each
  sections.forEach(current => {
    const sectionHeight = current.offsetHeight;
  
    // Original:
    // const sectionTop = current.offsetTop - 50;
    //  
    // Alex Turnwall's update:
    // Updated original line (above) to use getBoundingClientRect instead of offsetTop, based on:
    // https://plainjs.com/javascript/styles/get-the-position-of-an-element-relative-to-the-document-24/
    // https://newbedev.com/difference-between-getboundingclientrect-top-and-offsettop
    // This allows the use of sections inside a relative parent, which I'm not using here, but needed for a project
    //
    const sectionTop = (current.getBoundingClientRect().top + window.pageYOffset) - 50;
    sectionId = current.getAttribute("id");
    
    /*
    - If our current scroll position enters the space where current section on screen is, add .active class to corresponding navigation link, else remove it
    - To know which link needs an active class, we use sectionId variable we are getting while looping through sections as an selector
    */
    if (
      scrollY > sectionTop &&
      scrollY <= sectionTop + sectionHeight
    ){
      document.querySelector("nav a[href*=" + sectionId + "]").classList.add("active");
    } else {
      document.querySelector("nav a[href*=" + sectionId + "]").classList.remove("active");
    }
  });
}

</script>
@endsection