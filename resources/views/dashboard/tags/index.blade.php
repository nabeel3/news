@extends('dashboard.layout')
@section('content')
<h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('tags.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New</a>
           
          </div>
          
        </div>
@if(!$tags->isEmpty())


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
          @foreach ($tags as $tag)
          <tr>
          	<td>{{$tag->id}}</td>
          	<td>{{$tag->name}}</td>
          	<td>{{$tag->created_at}}</td>
          	<td>{{$tag->updated_at}}</td>
          	<td></td>
          	<td>
          		<div class="btn-group" tag="group" aria-label="Basic example">
				  <a href="{{route('tags.show',$tag->id)}}" type="button" class="btn btn-link">Show</a>
				  <form method="post" action="{{route('tags.destroy',$tag->id)}}">
				  	@method('DELETE')
				  	@csrf
				    <button type="submit" class="btn btn-link">Delete</button>
				  </form>
				  <a href="{{route('tags.edit',$tag->id)}}" type="button" class="btn btn-link">Edit</a>
				</div>
          		
          	</td>

          	
          </tr>
          @endforeach
          <tbody>
           
          </tbody>
        </table>
      </div>
  @else 
  <p class="alert alert-info">No Roles Record Found</p>    
  @endif
@endsection