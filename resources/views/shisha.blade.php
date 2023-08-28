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
                <th scope="col">Price</th>
                <th scope="col">Img</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($food as $b)
                <tr>
                <td>{{ $b->name }}</td>
                <td>{{ $b->desc }}</td>
                <td>{{ $b->price }}</td>
                <img class="fl col-lg-12" src="{{asset('file/'.$cc->img)}}" />

                <td><a href="{{route('deleteshisha',$b->id)}}" >Delete {{ $b->name }}<a></td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $food->links() !!}
        </div>
        </div>
        </div>
  <div id="create" class="tab-pane fade">
  <form method="post" action="{{route('uploadshisha')}}">
            @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Item  Name</label>
    <input name="name" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Category </label>
    <select  name="cat"  class="form-control">
@foreach($cat as $c)

<option value="{{$c->id}}">{{$c->name}}</option>
@endforeach

</select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Item  Price</label>
    <input name="price" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <input type="hidden" id="prof" name="profile"/>

  <label for="exampleInputPassword1">Upload  Image </label>

<div class="form-control" style="height:300px;"
      class="dropzone"
      id="profile">
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea name="description" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
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
  <div id="update" class="tab-pane fade">
  <form  method="post" action="{{route('updateshisha')}}">
            @csrf

            <div class="form-group">
    <label >Food  Name </label>
    <select  name="old"  required type="text" class="form-control" >
    @foreach($food as $b)
                <option value="{{ $b->id }}">{{ $b->name }}</td>
    
                @endforeach

</select>
  </div> <div class="form-group">
    <label for="exampleInputEmail1">Item  Name</label>
    <input name="name" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Category </label>
    <select  name="cat"  class="form-control">
@foreach($cat as $c)

<option value="{{$c->id}}">{{$c->name}}</option>
@endforeach

</select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Item  Price</label>
    <input name="price" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <input type="hidden" id="prof2" name="profile"/>

  <label for="exampleInputPassword1">Upload  Image </label>

<div class="form-control" style="height:300px;"
      class="dropzone"
      id="profile2">
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
});
    </script>

</div>
</div>
</div>
@endsection
