@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form method="post" action="{{route('uploadrestaurant')}}">
            @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Restaurant Name</label>
    <input name="name" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Resturant name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Restaurant Email</label>
    <input name="email" required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Resturant Email ">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Restaurant Password</label>
    <input name="password" required type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Resturant Password">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Address</label>
    <input name="address" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Resturant Address">
  </div>
  <div class="form-group">
  <label for="exampleInputEmail1">Mobile</label>
  <input name="mobile" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Resturant 
  Mobile Number">

        </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Type</label>
<Select required  name="type" class="form-control">
<option value="restuarant">Restaurant</option>
<option value="cafe">Cafe</option>
<option value="caferest">Cafe/Restuarant</option>
</select>
<input type="hidden" id="prof" name="profile"/>
<input type="hidden" id="cover"  name="cover"/>
</div>
<label for="exampleInputPassword1">Upload Profile Picture </label>

<div class="form-control" style="height:300px;"
      class="dropzone"
      id="profile">
    </div>
    <label for="exampleInputPassword1">Upload Cover  Picture </label>

    <div class="form-control" style="height:300px;"
      class="dropzone"
      id="coverphoto">
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
    $(document).ready(function(){
        var profile =  $("#profile").dropzone({ url: "addimg",
            paramName: "file", // Las imágenes se van a usar bajo este nombre de parámetro
        autoProcessQueue:true,
        required:true,
        acceptedFiles: ".png,.jpg,.gif,.jpeg",
        addRemoveLinks: true,
        maxFiles:1,
        parallelUploads : 1,
        maxFilesize:5,
        method: 'post',
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
        init: function() {
            this.on("success", function(file, response) {

                $("#prof").val(response);


           }) 
     }

    });
    var profile =  $("#coverphoto").dropzone({ url: "addimg",
            paramName: "file", // Las imágenes se van a usar bajo este nombre de parámetro
        autoProcessQueue:true,
        Message: "Drag your image here",
        required:true,
        acceptedFiles: ".png,.jpg,.gif,.jpeg",
        addRemoveLinks: true,
        maxFiles:1,
        parallelUploads : 1,
        maxFilesize:5,
        method: 'post',
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
        init: function() {
            this.on("success", function(file, response) {

                $("#cover").val(response);


           }) 
     }

    });
    })
</script>
@endsection
