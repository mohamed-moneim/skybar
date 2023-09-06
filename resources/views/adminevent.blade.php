@extends('layouts.dashboard')
@section('content')
<div class="container">
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab"  class="tab" href="#home">Home</a></li>
</ul>

<div class="tab-content">
  <div id="home"  class="tab-pane fade show active">
    <div class="container mt-5">
        <table id="tbl" class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Img</th>
                <th scope="col">Video</th>
                <th scope="col">Users</th>

                </tr>
            </thead>
            <tbody>
                @foreach($ev as $b)
                <tr>
                <td>{{ $b->name }}</td>
                <td>{{ $b->desc }}</td>
                <td>{{ $b->date }}</td>
                <td><img width="320" src="{{asset('file/'.$b->img)}}" /></td>
                <td>
                <video width="320" height="240" controls>
                  <source src="{{asset('file/'.$b->video)}}">
</video>
                
</td>
<td>
<a href="{{route('eventusers',$b->id)}}">Users </a>
</td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $ev->links() !!}
        </div>
        </div>
        </div>

</div>
</div>
</div>
@endsection
