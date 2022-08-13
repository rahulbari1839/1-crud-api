@extends('main')
@section('content')


<div class="container">
      
      <div class="row">
    
    <div class="col-md-4 ">
        <h2 class="py-4">Create Events</h2>
    </div>
    <div class="col-md-4 offset-4 text-right py-4">
        <a href="{{ url('events') }}" class="btn btn-info">Manage Events</a>
    </div>
   </div>
    <div class="row">
        <div class="col-md-5 m-auto">

            <form class="card p-4" action="{{ url('events/create')}}" method="post">
                  @csrf
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name = "name" class="form-control" placeholder="Enter name" value="{{ old('name') }}">
              </div>
              <div class="form-group">
                <label for="name">Slug</label>
                <input type="text" name = "slug" class="form-control" placeholder="Enter Slug" value="{{ old('slug') }}">
              </div>
              
              <div class="text-right">
                  <button type="submit" class="btn btn-success">Save</button>
              </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('scripts')
@endsection
