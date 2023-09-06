@extends("layouts.app3")
@section('content')
<div class="nopadding row">
<div class="nopadding col-sm-10 text-center ato">
      @foreach($food as $f)
    <img class="fl" src="{{asset('public/file/'.$f->img)}}" />

<table id="tbl" style="margin:50px;" class="table table-borderless">
            <tbody>
              <tr>
              <td class="text-left"><h4>{{Lang::locale()=="en"?$f->name_en:$f->name}}</h4></td>
              <td class="text-left after">{{$f->price}} {{__('message.curr')}} </td>
</tr>
<tr>
<td class="text-left" colspan="2"><p>{{Lang::locale()=="en"?$f->desc_en:$f->desc}}</p></td>
</tr>
</tbody>
<table id="tbl">
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