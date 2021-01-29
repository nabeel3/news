<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(5);
        return view('dashboard.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('dashboard.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tags = new Tag();
        $tags->name = $request->name;
        $save = $tags->save();
        if ($save) {
            return redirect()->route('tags.index');
            # code...
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\role  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $tag = Tag::find($id);
        return view('dashboard.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\role  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $tag = Tag::find($id);
        return view('dashboard.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\role  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)

    {    
        // dd(1);
         $tags = Tag::find($id);
         $tags->name = $request->name;
         $save = $tags->save();
        if ($save) {
            return redirect()->route('tags.index');
            # code...
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\role  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    { 
        // dd(1);
        $deleted = Tag::find($id)->delete();
        return redirect()->route('tags.index');
    }
}
