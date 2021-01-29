@extends('dashboard.layout')
@section('content')
<h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('tags.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New</a>
           
          </div>
          
        </div>
@if($tag)


      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Created_at</th>
              <th>Updated_at</th>
              <th>Users	</th>
              <th>Action</th>
            </tr>
          </thead>
          
          <tr>
          	<td>{{$tag->id}}</td>
          	<td>{{$tag->name}}</td>
          	<td>{{$tag->created_at}}</td>
          	<td>{{$tag->updated_at}}</td>
          	<td></td>
          	<td>
          		<a href="{{route('tags.show',$tag->id)}}">Show</a>
          		<a href="{{route('tags.destroy',$tag->id)}}">Delet</a>
          		<a href="{{route('tags.edit',$tag->id)}}">Edit</a>
          	</td>

          	
          </tr>
      
          <tbody>
           
          </tbody>
        </table>
      </div>
  @else 
  <p class="alert alert-info">No tags Record Found</p>    
  @endif
@endsection