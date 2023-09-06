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
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>

                </tr>
            </thead>
            <tbody>
                @foreach($ev as $b)
                <tr>
                <td>{{ $b->name }}</td>
                <td>{{ $b->email }}</td>
                <td>{{ $b->mobile }}</td>

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
