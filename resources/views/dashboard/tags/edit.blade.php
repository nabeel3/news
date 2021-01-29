@extends('dashboard.layout')
@section('content')
<form method="Post" action="{{route('tags.update',$tag->id)}}">
	@method('PUT')
	@csrf
 <div class="row">	
 	<div class="col-md-8">
     <div class="form-group">
      <label for="inputRoleName">Edit Tag</label>
       <input type="text" class="form-control" name="name" id="inputRoleName" placeholder="Enter Tag" value="{{$tag->name}}">
      <!--  <input type="hidden" name="_method" value="PUT"> -->
     <!--  <input type="hidden" value="{{$tag->id}}" name="id"> -->
     </div>
    </div>
   </div> 
      <button type="submit" class="btn btn-primary">Update</button>
</form>




@endsection