@extends("layouts.app3")
@section('content')

<div class="col-lg-12 nopadding">
        <div class="col-lg-10 rel nopadding text-center ato">
        <img class="fl" src="{{asset('public/file/'.$f->img)}}" />
        @if($f->video)
        <video  controls style="padding:50px;" class="col-lg-10">
                  <source src="{{asset('public/file/'.$f->video)}}">
</video>         
@endif
<div class="row">
<div class="col-lg-8">
<table id="tbl" class="table table-borderless evtable">
            <tbody>
              <tr>
              <td class="text-left"><h4>{{Lang::locale()=="en"?$f->name_en:$f->name}}</h4></td>
              <td class="text-left"><h6>{{$f->price}} {{__('message.curr')}} </h6></td>
              <td class="text-left"><h6>{{$f->date}}</h6></td>
</tr>
<tr>
<td colspan="3" class="text-left"><p>{{Lang::locale()=="en"?$f->desc_en:$f->desc}}</p></td>

</tr>
</tbody>
</table>
</div>
<div class="col-lg-2">
<button style="margin-top:50px;" class="btn btn2 btn-primary text-center"  data-toggle="modal" data-target="#exampleModal">Register</button>
</div>
</div>
</div>   
 


</div>   
</div>                     
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('message.register')}} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{route('addeventuser')}}">
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
  <div class="form-group text-left">
    <label for="exampleInputEmail1">Table</label>
    <select name="tbl" required  class="form-control">
    @foreach($rt as $tt)
  <option value="{{$tt->id}}">{{$tt->name}} - ({{$tt->type}} Persons)</option>
    @endforeach
  </div>
  <input type="hidden" name="eid" value="{{$f->id}}" />
  <div style="padding-top:20px;" class="form-group text-left">

  <button type="submit" class="btn btn-primary col-lg-12  sbmt">{{__('message.register')}} </button>
</div>
</form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
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
</script>
@endsection