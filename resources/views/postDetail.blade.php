@include('header')
<div class="container">
<div class="p-4 p-md-5 mb-4 text-white rounded bg-main">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">News</h1>
      <!-- <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
      <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p> -->
    </div>
  </div>

<div class="row mb-2">
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
      {{$post->title}}
      </h3>

      <article class="blog-post">
        <h2 class="blog-post-title">{{$post->title}}</h2>

        <p class="blog-post-meta">{{$post->created_at->todatestring()}}</p>
        <div class="">
          <div class="text-center">
          <img style="    border: #e0e0e0 solid 1px;
    padding: 3px;" src="{{asset('images/blog/'.$post->thumbnail)}}" class="img-fluid" >
          </div>
          
        </div>
        <p>{!!$post->content!!}</p>
       
              <?php 
                          $tagIds = $post->tag_id;                
                          $tagIds = explode(',',$tagIds);
                          for($i=0;$i<count($tagIds);$i++){
                            $tagName = DB::select('SELECT name FROM tags WHERE id = '.$tagIds[$i].''); 
                            $name = $tagName[0]->name;
              ?>
               <a class="btn btn-outline-primary" href="#">{{ $name }} </a>          
              <?php       }          
              ?>
      </article><!-- /.blog-post -->
      
   
     </div>

   
    <div class="col-md-4">
       @foreach ($posts as $post)
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">{{$post->category->title}}</strong>
          <h3 class="mb-0">{{$post->title}}</h3>
          <div class="mb-1 text-muted">{{$post->created_at->todatestring()}}</div>
          
          <a href="{{url('detail',$post->id)}}" class="stretched-link">Continue reading</a>
        </div>
        
      </div>
        @endforeach
    </div>
  
    </div>
</div>

@include('footer')