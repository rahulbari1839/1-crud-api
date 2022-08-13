@extends('main')
@section('content')


<div class="container">
    <h2 class="py-4">Manage Events</h2>
   <div class="row">
    <div class="col-md-4">
        
            <form action="{{ url('events')}}" method="get" >
                <div class="input-group mb-3">
                @csrf
              <input type="text" name="search_event" class="form-control" placeholder="Search" value="{{ $search_text }}">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
              </div>
              </div>
          </form>
        
    </div>
    <div class="col-md-4 offset-4 text-right">
        <a href="{{ url('events/create') }}" class="btn btn-success">Add</a>
    </div>
   </div>

  <table class="table table-bordered table-hover">
    <thead>

      <tr>
        <th>Name</th>
        <th>Slug</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        @php 
        $html = '';
        if(isset($list) && count($list)){
            foreach($list as $event_info){
                $html .= '<tr>';
                $html .= '<td>'.$event_info->name.'</td>';
                $html .= '<td>'.$event_info->slug.'</td>';
                $edit_url = url('/events/').'/'.$event_info->id.'/edit';
                $delete_url = url('/events/delete').'/'.$event_info->id;
                $html .= '<td class="text-center"><a class="btn btn-primary" href="'.$edit_url.'"><i class="fa-solid fa-pen-to-square"></i></a> <a class="btn btn-danger" href="'.$delete_url.'"><i class="fa-solid fa-trash"></i></a></td>';
                $html .= '</tr>';
            }

        }else{
            $html = "<tr class='text-center'><td colspan='3'>Data Not Found</td></tr>";
        }
        echo $html;
        @endphp
      </tr>
    </tbody>
  </table>
  {{ $list->links() }}
</div>


@endsection
@section('scripts')
@endsection
