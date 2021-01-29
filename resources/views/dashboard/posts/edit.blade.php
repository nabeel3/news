@extends('dashboard.layout')
@section('content')
<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <form method="post" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
         <div class="row card p-3"> 
    <div class="col-md-8 card-body">

        <div class="form-group">
            <label for="inputRoleName">Add New Title</label>
            <input type="text" class="form-control" name="title" id="inputRoleName" placeholder="Enter title" value="{{$post->title}}">
        </div>
              
                <div class="form-group">
                    <label for="inputRoleName">Selec Category</label>
                    @if(!$categories->isEmpty())
                     @foreach($categories as $category)
                     <?php  
                             $tagIds = $post->category_id;
                            
                         ?>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="category_id" id="exampleRadios1" value="{{ $category->id }}"  <?php if($category->id == $tagIds){echo "checked";} ?> >
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
                     <?php  
                             $tagIds = $post->tag_id;
                             $tagIds = explode(',',$tagIds);
                         ?>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tags[]" id="exampleRadios1 value="{{ $tag->id }}" <?php if(in_array($tag->id,$tagIds)){echo "checked";} ?> >
                    <label class="form-check-label" for="exampleRadios1">
                    {{$tag->name}}
                    </label>
                  </div>
                  @endforeach
                   @endif
                </div>
    
       

        <div class="form-group">
            <label for="inputRoleName">Add New Content</label>
            <textarea class="form-control" name="content" id="messageArea" rows="3">{{$post->content}}</textarea>
        </div>
        <div class="form-group">
            <img src="{{asset('images/blog/'.$post->thumbnail)}}"  width="100" height="100">
            
            <input type="file" name="thumbnail" value="{{$post->thumbnail}}}"  class="form-control" id="inputRoleName" >
        </div>
     
      


        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
        <input type="hidden" value="{{$post->id}}" name="update">

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