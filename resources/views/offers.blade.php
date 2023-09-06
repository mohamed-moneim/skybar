@extends('layouts.restaurant')
@section('content')
<div class="container">
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab"  class="tab" href="#home">Home</a></li>
  <li><a data-toggle="tab"  class="tab" href="#create">Create</a></li>

  <li><a data-toggle="tab"  class="tab" href="#update">Update</a></li>
</ul>

<div class="tab-content">
  <div id="home"  class="tab-pane fade show active">
    <div class="container mt-5">
        <table id="tbl" class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Name English</th>
                <th scope="col">Description English</th>
                <th scope="col">Before Price</th>
                <th scope="col">Price</th>
                <th scope="col">Img 1</th>
                <th scope="col">Img 2</th>
                <th scope="col">Img 3</th>
                <th scope="col">Activate/Disactivate</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($offer as $b)
                <tr>
                <td>{{ $b->name }}</td>
                <td>{{ $b->desc }}</td>
                <td>{{ $b->name_en }}</td>
                <td>{{ $b->desc_en }}</td>
                <td>{{ $b->beforeprice }}</td>
                <td>{{ $b->price }}</td>
                <td><img style="width:300px;" src="public/file/{{ $b->img }}" /></td>
                <td><img style="width:300px;" src="public/file/{{ $b->img2 }}" /></td>
                <td><img style="width:300px;" src="public/file/{{ $b->img3 }}" /></td>

                <td><a href="{{route('activeoffer',$b->id)}}" >{{ $b->active?"Disable":"Enable" }}<a></td>
                <td><a href="{{route('deleteoffer',$b->id)}}" >Delete {{ $b->name }}<a></td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $offer->links() !!}
        </div>
        </div>
        </div>
  <div id="create" class="tab-pane fade">
  <form method="post" action="{{route('uploadoffer')}}">
            @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Offer Name</label>
    <input name="name" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Offer Name English</label>
    <input name="namee" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Before  Price</label>
    <input name="beforeprice" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Item  Price</label>
    <input name="price" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <input type="hidden" id="prof" name="profile"/>
  <input type="hidden" id="img2" name="img2"/>
  <input type="hidden" id="img3" name="img3"/>

  <label for="exampleInputPassword1">Upload  Image 1</label>

<div class="form-control" style="height:300px;"
      class="dropzone"
      id="img2upload">
    </div>
    <label for="exampleInputPassword1">Upload  Image 2</label>

<div class="form-control" style="height:300px;"
      class="dropzone"
      id="img3upload">
    </div>
    <label for="exampleInputPassword1">Upload  Image 3 </label>

<div class="form-control" style="height:300px;"
      class="dropzone"
      id="profile">
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea name="description" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
</textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description English</label>
    <textarea name="descriptione" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
    $(document).ready(function(){
        var profile =  $("#profile").dropzone({ url: "addimg",
            paramName: "file", // Las imágenes se van a u{{__('message.curr')}}  bajo este nombre de parámetro
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
        var profile =  $("#img3upload").dropzone({ url: "addimg",
            paramName: "file", // Las imágenes se van a u{{__('message.curr')}}  bajo este nombre de parámetro
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

                $("#img2").val(response);


           }) 
     }

    });
});
    </script>
    <script>
    $(document).ready(function(){
        var profile =  $("#img2upload").dropzone({ url: "addimg",
            paramName: "file", // Las imágenes se van a u{{__('message.curr')}}  bajo este nombre de parámetro
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

                $("#img3").val(response);


           }) 
     }

    });
});
    </script>
  <div id="update" class="tab-pane fade">
  <form  method="post" action="{{route('updateoffer')}}">
            @csrf

            <div class="form-group">
    <label >Offer  Name </label>
    <select  name="old"  required type="text" class="form-control" >
    @foreach($offer as $b)
                <option value="{{ $b->id }}">{{ $b->name }}</td>
    
                @endforeach

</select>
  </div> <div class="form-group">
    <label for="exampleInputEmail1">Item  Name</label>
    <input name="name" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Offer Name English</label>
    <input name="namee" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Item  Price</label>
    <input name="price" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Before  Price</label>
    <input name="beforeprice" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <input type="hidden" id="prof2" name="profile"/>
  <input type="hidden" id="img4" name="img2"/>
  <input type="hidden" id="img5" name="img3"/>

  <label for="exampleInputPassword1">Upload  Image 1 </label>

<div class="form-control" style="height:300px;"
      class="dropzone"
      id="profile2">
    </div>
    <label for="exampleInputPassword1">Upload  Image 2 </label>

<div class="form-control" style="height:300px;"
      class="dropzone"
      id="upimg2">
    </div>
    <label for="exampleInputPassword1">Upload  Image 3 </label>

<div class="form-control" style="height:300px;"
      class="dropzone"
      id="upimg3">
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea name="description" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
</textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description English</label>
    <textarea name="descriptione" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
            paramName: "file", // Las imágenes se van a u{{__('message.curr')}}  bajo este nombre de parámetro
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
    <script>
    $(document).ready(function(){
        var profile =  $("#upimg2").dropzone({ url: "addimg",
            paramName: "file", // Las imágenes se van a u{{__('message.curr')}}  bajo este nombre de parámetro
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

                $("#img4").val(response);


           }) 
     }

    });
});
    </script>
    <script>
    $(document).ready(function(){
        var profile =  $("#upimg3").dropzone({ url: "addimg",
            paramName: "file", // Las imágenes se van a u{{__('message.curr')}}  bajo este nombre de parámetro
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

                $("#img5").val(response);


           }) 
     }

    });
});
    </script>

</div>
</div>
</div>
<script>
  $(document).ready( function () {
    $('#tbl').DataTable();
} );
</script>
@endsection
