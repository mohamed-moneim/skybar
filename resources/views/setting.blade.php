@extends('layouts.dashboard')
@section("content")
<div class="container">
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Home</a></li>

</ul>

<div class="tab-content">
  <div id="home"  class="tab-pane fade show active">
    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Mobile</th>
                <th scope="col">Type</th>
                <th scope="col">Profile Photo</th>
                <th scope="col">Cover Photo</th>
                <th scope="col">Enable/Disable</th>
                <th scope="col">Apply Setting</th>
                <td scope="col">Events</td>
                <td scope="col">Users</td>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $b)
                <tr>
                <td>{{ $b->name }}</td>
                <td>{{ $b->email }}</td>
                <td>{{ $b->address }}</td>
                <td>{{ $b->mobile }}</td>
                <td>{{ $b->type }}</td>
                <td><img width="100" src="{{asset('file/'.$b->profilepic)}}" /></td>
                <td><img width="100" src="{{asset('file/'.$b->coverpic)}}" /></td>            
                <td><a href="{{route('disablerest',$b->id)}}" >{{$b->active?"Disable ": "Enable"}}<a></td>
                <td>
                    <form action='addsett' method="post">
                        @csrf
                        <input type='hidden' value='{{$b->id}}' name='rid' />
                <select name = "val" class="form-group">

                <option value="1">Enable</option>
                <option value="0">Disable</option>

</select>
<select name="type" class="form-group">

<option value="food">Food</option>
<option value="bar">Bar</option>
<option value="shisha">Shisha</option>
<option value="event">Event</option>
<option value="table">Table</option>
<option value="offer">Offer</option>

</select>
<button class='btn btn-primary'>Save</button>
</form>

                </td>
                <td><a href="{{route('restevents',$b->id)}}">Events</a></td>
                <td><a href="{{route('restusers',$b->id)}}">Users </a></td>
                <td>Users</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $users->links() !!}
        </div>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

</div>
</div>
</div>
@endsection

