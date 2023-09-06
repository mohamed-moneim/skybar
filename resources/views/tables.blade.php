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
                <th scope="col">Type</th>
                <th scope="col">Price</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tbls as $b)
                <tr>
                <td>{{ $b->name }}</td>
                <td>{{ $b->type }}</td>
                <td>{{ $b->price }}</td>
                <td><a href="{{route('deletetable',$b->id)}}" >Delete {{ $b->name }}<a></td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $tbls->links() !!}
        </div>
        </div>
        </div>
  <div id="create" class="tab-pane fade">
  <form method="post" action="{{route('uploadtable')}}">
            @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Table  Name</label>
    <input name="name" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Table Type </label>
    <select  name="cat"  class="form-control">

    <option value="2">Double</option>
    <option value="3">Triple</option>
    <option value="4">Four</option>
    <option value="5">Five</option>
    <option value="6">six</option>
    <option value="7">seven</option>
    <option value="8">eight</option>
    <option value="9">nine</option>
    <option value="10">ten</option>
</select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Item  Price</label>
    <input name="price" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <input type="hidden" id="prof" name="profile"/>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
  <div id="update" class="tab-pane fade">
  <form  method="post" action="{{route('updatetable')}}">
            @csrf

            <div class="form-group">
    <label >Food  Name </label>
    <select  name="old"  required type="text" class="form-control" >
    @foreach($tbls as $b)
                <option value="{{ $b->id }}">{{ $b->name }}</td>
    
                @endforeach

</select>
  </div>  <div class="form-group">
    <label for="exampleInputEmail1">Table  Name</label>
    <input name="name" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Table Type </label>
    <select  name="cat"  class="form-control">

    <option value="2">Double</option>
    <option value="3">Triple</option>
    <option value="4">Fourth</option>
    <option value="5">Fifth</option>
</select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Item  Price</label>
    <input name="price" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <input type="hidden" id="prof" name="profile"/>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

</div>
</div>
</div>
<script>
  $(document).ready( function () {
    $('#tbl').DataTable();
} );
</script>
@endsection
