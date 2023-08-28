@extends("layouts.app3")
@section('content')
<div class="nopadding row">
<div class="nopadding col-lg-12 text-center">
      @foreach($food as $f)
    <img class="fl" src="{{asset('public/file/'.$f->img)}}" />

<table style="margin:50px;" class="table table-borderless">
            <thead>
                <tr class="">
                <th>Name</th>
                <th >Price </th>
                </tr>
            </thead>
            <tbody>
              <tr>
              <td>{{$f->name}}</td>
              <td>{{$f->price}} SAR</td>
</tr>
<tr>
<td class="text-center" colspan="2">{{$f->desc}}</td>
</tr>
</tbody>
<table>
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