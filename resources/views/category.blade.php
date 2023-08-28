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
                <th scope="col">Image</th>
                <th scope="col">Delete</th>
                <th scope="col">Arrange</th>
                </tr>
            </thead>
            <tbody class="add">
                <?php
                $max = 0;
                ?>
                
                @foreach($cat as $b)
                <tr class="catrow" vll="{{$b->order}}">
                <td>{{ $b->name }}</td>
                <?php if((int)  $b->order > (int) $max)
                $max = (int)$b->order;
                ?>
                <td><img style="width:300px;" src="public/file/{{ $b->img }}" /></td>

                <td><a href="{{route('deletecat',$b->id)}}" >Delete {{ $b->title }}<a></td>
                <td>

                <form action='{{route("arrange")}}' method="post">
                        @csrf
                        <input type='number' value='1' name='order' />
                        <input type='hidden' value='{{$b->id}}' name='rid' />
                        <button class='btn btn-primary'>Save</button>

</form>

                </td>

              </tr>

                @endforeach

            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $cat->links() !!}
        </div>
        </div>
        </div>
  <div id="create" class="tab-pane fade">
  <form method="post" action="{{route('uploadcategory')}}">
            @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <input name="name" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <input type="hidden" id="prof" name="profile"/>

  <label for="exampleInputPassword1">Upload  Image </label>

<div class="form-control" style="height:300px;"
      class="dropzone"
      id="profile">
</div>
<input type="hidden" name="order" value="{{(int)$max+1}}" />
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
  <form  method="post" action="{{route('updatecategory')}}">
            @csrf

            <div class="form-group">
    <label >Book Title</label>
    <select  name="old"  required type="text" class="form-control" >
    @foreach($cat as $b)
                <option value="{{ $b->id }}">{{ $b->name }}</td>
    
                @endforeach

</select>
  </div><div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <input name="name" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <input type="hidden" id="prof2" name="profile"/>

  <label for="exampleInputPassword1">Upload  Image </label>

<div class="form-control" style="height:300px;"
      class="dropzone"
      id="profile2">
    </div>
    <input class="or" type="hidden" name="order" value="{{(int)$max+1}}" />

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
