@extends('layouts.restaurant')
@section('content')
<div class="container">
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
  <li><a data-toggle="tab" href="#create">Create</a></li>

  <li><a data-toggle="tab" href="#update">Update</a></li>
</ul>

<div class="tab-content">
  <div id="home"  class="tab-pane fade show active">
    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Img</th>
                <th scope="col">Video</th>
                <th scope="col">Tables</th>
                <th scope="col">Delete</th>

                </tr>
            </thead>
            <tbody>
                @foreach($event as $b)
                <tr>
                <td>{{ $b->name }}</td>
                <td>{{ $b->desc }}</td>
                <td>{{ $b->date }}</td>
                <td><img width="320" src="{{asset('/public/file/'.$b->img) }}" /></td>
                <td>
                <video width="320" height="240" controls>
                  <source src="{{asset('/public/file/'.$b->video) }}">
</video>
                
                </td>
                <td><a href="{{route('eventtables',$b->id)}}" >Tables {{ $b->name }}<a></td>
                <td><a href="{{route('deleteevent',$b->id)}}" >Delete {{ $b->name }}<a></td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $event->links() !!}
        </div>
        </div>
        </div>
  <div id="create" class="tab-pane fade">
  <form method="post" action="{{route('uploadevent')}}">
            @csrf
             <div class="form-group">
    <label for="exampleInputEmail1">Event  Name</label>
    <input name="name" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Event  Date</label>
    <input name="date" required type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Event  Price</label>
    <input name="price" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <input type="hidden" id="prof" name="profile"/>
  <input type="hidden" id="vid" name="vid"/>

  <label for="exampleInputPassword1">Upload  Image </label>

<div class="form-control" style="height:300px;"
      class="dropzone"
      id="profile">
    </div>
    <label for="exampleInputPassword1">Upload Video </label>

<div class="form-control" style="height:300px;"
      class="dropzone"
      id="profile3">
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea name="description" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>


  <div id="update" class="tab-pane fade">
  <form  method="post" action="{{route('updateevent')}}">
            @csrf

            <div class="form-group">
    <label >Food  Name </label>
    <select  name="old"  required type="text" class="form-control" >
    @foreach($event as $b)
                <option value="{{ $b->id }}">{{ $b->name }}</td>
    
                @endforeach

</select>
  </div> <div class="form-group">
    <label for="exampleInputEmail1">Item  Name</label>
    <input name="name" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Event  Date</label>
    <input name="date" required type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Item  Price</label>
    <input name="price" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <input type="hidden" id="prof2" name="profile"/>
  <input type="hidden" id="vid2" name="vid"/>

  <label for="exampleInputPassword1">Upload  Image </label>

<div class="form-control" style="height:300px;"
      class="dropzone"
      id="profile2">
    </div>
    <label for="exampleInputPassword1">Upload Video </label>

<div class="form-control" style="height:300px;"
      class="dropzone"
      id="profile4">
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea name="description" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
</textarea>
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
});
    </script>
<script>
    $(document).ready(function(){
        var profile =  $("#profile2").dropzone({ url: "addimg",
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

                $("#prof2").val(response);


           }) 
     }

    });
    var profile =  $("#profile3").dropzone({ url: "addvideo",
            paramName: "file", // Las imágenes se van a usar bajo este nombre de parámetro
        autoProcessQueue:true,
        required:true,
        acceptedFiles: ".mp4,.mkv,.avi",
        addRemoveLinks: true,
        maxFiles:1,
        parallelUploads : 1,
        maxFilesize:12,
        method: 'post',
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
        init: function() {
            this.on("success", function(file, response) {

                $("#vid").val(response);


           }) 
     }

    });
    var profile =  $("#profile4").dropzone({ url: "addvideo",
            paramName: "file", // Las imágenes se van a usar bajo este nombre de parámetro
        autoProcessQueue:true,
        required:true,
        acceptedFiles: ".mp4,.mkv,.avi",
        addRemoveLinks: true,
        maxFiles:1,
        parallelUploads : 1,
        maxFilesize:12,
        method: 'post',
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
        init: function() {
            this.on("success", function(file, response) {

                $("#vid2").val(response);


           }) 
     }

    });
});
    </script>

</div>
</div>
</div>
@endsection
