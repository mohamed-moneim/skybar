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
                <th scope="col">Name
                </th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>


                </tr>
            </thead>
            <tbody>
                @foreach($tbls as $b)
                <tr>
                <td>{{ $b->name }}</td>
                <td>{{ $b->email }}</td>
                <td>{{ $b->mobile }}</td>
               
                </tr>
                @endforeach
            </tbody>
        </table>

        </div>
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
