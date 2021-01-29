@extends('dashboard.layout')
@section('content')
<!--  <script src="{{ asset('js/ckeditor.js') }}" ></script> -->
<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
	@csrf
 <div class="row card p-3">	
 	<div class="col-md-8 card-body">

        <div class="form-group">
            <label for="inputRoleName">Add New Title</label>
            <input type="text" class="form-control" name="title" id="inputRoleName" placeholder="Enter title">
        </div>
              
                <div class="form-group">
                    <label for="inputRoleName">Selec Category</label>
                    @if(!$categories->isEmpty())
                     @foreach($categories as $category)
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="category_id" id="exampleRadios1" value="{{$category->id}}" >
                    <label class="form-check-label" for="exampleRadios1">
                    {{$category->title}}
                    </label>
                  </div>
                  @endforeach
                   @endif
                </div>


                <div class="form-group">
                    <label for="inputRoleName">Selec Tags</label>
                    @if(!$tags->isEmpty())
                     @foreach($tags as $tag)
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tags[]" id="exampleRadios1" value="{{$tag->id}}" >
                    <label class="form-check-label" for="exampleRadios1">
                    {{$tag->name}}
                    </label>
                  </div>
                  @endforeach
                   @endif
                </div>
    
       

        <div class="form-group">
            <label for="inputRoleName">Add New Content</label>
            <textarea class="form-control" name="content" id="messageArea" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="inputRoleName">Add New thumbnail</label>
            <input type="file" class="form-control" name="thumbnail" id="inputRoleName" placeholder="chose file">
        </div>
     
      


        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">

    </div>
   </div> 
      <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script type="text/javascript">
         CKEDITOR.replace( 'messageArea',
         {
          customConfig : 'config.js',
          toolbar : 'simple'
          })
</script> 



@endsection