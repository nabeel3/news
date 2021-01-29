<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Gate;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();


//        $posts = Post::with('getUserPost')->where('user_id', '=', '1')->get();
        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('dashboard.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $tag_id = $request->tags;
            if (!empty($tag_id)) {
            $tag_id = implode(',', $tag_id);
            } else {
            $tag_id = '';
            }



           
        $post = new Post();

        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;
        // $post->tag_id = $request->tag_id;
       

        $post->tag_id = $tag_id;
        $post->category_id = $request->category_id;

        $filename = sprintf('thumbnail_%s.jpg',random_int(1, 1000));


        if ($request->hasFile('thumbnail'))
            $file = $request->file('thumbnail');
        $fileName = $request->file('thumbnail')->getClientOriginalName();
        $destinationPath = 'images/blog';
        $file->move($destinationPath,$file->getClientOriginalName());
        $post->thumbnail= $fileName;




        $save = $post->save();
      

        if ($save) {
            return redirect()->route('posts.index');
            # code...
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
//    
        return view('dashboard.posts.edit', compact('post','categories','tags'));
//     \





    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        
        $tag_id = $request->tags;
            if (!empty($tag_id)) {
            $tag_id = implode(',', $tag_id);
            } else {
            $tag_id = '';
            }
            if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');

            $fileName = $request->file('thumbnail')->getClientOriginalName();

            $destinationPath = 'public/images';
            $file->move($destinationPath,$file->getClientOriginalName());


                    $data = [
                'thumbnail'       => $fileName,
                'title'     =>$request->title,
                'content'             =>$request->content,
                'user_id'    =>$request->user_id,
                'category_id'        =>$request->category_id,
               
            
            ]; 
            }else{
                 $data = [
                 'title'     =>$request->title,
                'content'             =>$request->content,
                'user_id'    =>$request->user_id,
                'category_id'        =>$request->category_id,
            
                    
              ];
        }
        // dd($data);

        $is_updated = Post::where('id',$request->update)->update($data);
        // Session::put('msg', 'Post Updated Successfully');
         return redirect()->route('posts.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
     public function postDetail($id)
    {
        $post = Post::find($id);

        $posts = Post::all();

        // $tags = $post->tags;
        // dd($tags);
        return view('postDetail',compact('post', 'posts'));
        
    }
      public function welcome()
    {
         $posts = Post::paginate(4);

         return view('welcome')->with('posts', $posts);
        
    }
   
}
