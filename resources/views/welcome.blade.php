@include('header')

<main class="container">
  <div class="p-4 p-md-5 mb-4 text-white rounded bg-main">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
      <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
    </div>
  </div>

  <div class="row mb-2">

    @foreach ($posts as $post)
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">{{$post->category->title}}</strong>
          <h5 class="mb-0">{{ Str::limit($post->title, 20) }} </h5>
          <div class="mb-1 text-muted">{{$post->created_at->todatestring()}}</div>
          <p class="card-text mb-auto">{!! Str::limit($post->content, 70) !!}</p>
          <a href="{{url('detail',$post->id)}}" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">

            <img class="bd-placeholder img-responsive" width="300" height="250" src="{{asset('images/blog/'.$post->thumbnail)}}">
    

        </div>
      </div>

    </div>
    @endforeach


 
  </div>
  {{$posts->links("pagination::bootstrap-4")}}


  <!-- /.row -->

</main><!-- /.container -->


@include('footer')