@extends("layouts.app3")
@section('content')

<div class="col-lg-12 nopadding">
        <div class="col-lg-12 rel nopadding text-center">
        <img class="fl" src="{{asset('public/file/'.$f->img)}}" />
        <video  controls style="padding:50px;" class="col-lg-6">
                  <source src="{{asset('public/file/'.$f->video)}}">
</video>         
<table class="table table-borderless evtable">
            <thead>
                <tr class="">
                <th >Event Name</th>
                <th >Price </th>
                <th >Date</th>
                </tr>
            </thead>
            <tbody>
              <tr>
              <td>{{$f->name}}</td>
              <td>{{$f->price}} SAR</td>
              <td>{{$f->date}}</td>
</tr>
<tr>
<td class="text-center" colspan="3">{{$f->desc}}</td>
</tr>
<tr>
<td class="text-center" colspan="3"><button class="btn btn2 btn-primary text-center"  data-toggle="modal" data-target="#exampleModal">Register</button></td>
</tr>
</tbody>
<table>
</div>   
 


</div>   
</div>                     
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reserve  this Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{route('addeventuser')}}">
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
  <div class="form-group">
    <label for="exampleInputEmail1">Table</label>
    <select name="tbl" required  class="form-control">
    @foreach($rt as $tt)
  <option value="{{$tt->id}}">{{$tt->name}} - ({{$tt->type}} Persons)</option>
    @endforeach
  </div>
  <input type="hidden" name="eid" value="{{$f->id}}" />
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