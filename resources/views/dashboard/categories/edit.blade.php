@extends('dashboard.layout')
@section('content')
<form method="post" action="{{route('categories.update',$category->id)}}">

  @method('PUT')
  @csrf
 <div class="row">  
  <div class="col-md-8">
     <div class="form-group">
      <label for="inputCategoryName">Edit Category</label>
       <input type="text" class="form-control" name="title" id="inputRoleName" placeholder="Enter Category Title" value="{{$category->title}}">
     </div>
   
  
     </div>
   
    </div>
    
      <button type="submit" class="btn btn-primary">Update</button>
</form>




@endsection