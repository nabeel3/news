@extends('dashboard.layout')
@section('content')
<form method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
	@csrf
 <div class="row">	
 	<div class="col-md-8">
     <div class="form-group">
      <label for="inputCategoryName">Add New Category</label>
       <input type="text" class="form-control" name="title" id="inputRoleName" placeholder="Enter Category Title">
     </div>
     

     
       
     </div>
   
    </div>
    
      <button type="submit" class="btn btn-primary">Add New</button>
</form>




@endsection