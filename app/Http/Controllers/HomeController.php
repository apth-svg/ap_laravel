<?php

namespace App\Http\Controllers;

use App\Test;
use App\Models\Post;
use App\Mail\PostStore;
use App\Models\Category;
use App\Mail\PostCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\storePostRequest;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index','create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Mail::raw('Hello World', function ($message) {
        //     $message->to('coco@gmail.com')->subject('AP laravel class');
        // });
        // dd(Post::pluck('name'));
        // dd(config('ap.class.third'));//Creae Config
        $data = Post::where('user_id',auth()->id())->orderBy('id','desc')->get();
        // $request->session()->flash('status', 'Task was successful!');
        return view('home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storePostRequest $request ,Post $post)
    {
        $validated = $request->validated();
       Post::create($validated + ['user_id'=>Auth::user()->id]);
        // Mail::to('coco@gmail.com')->send(new PostCreated(  ));
        // $request->validate([
        //     'name' => 'required|unique:posts|max:255',
        //     'description' => 'required|max:255',
        // ]);

        // $post->name = $request->name;
        // $post->description = $request->description;
        // $post->save();
        // Post::create([
        //     'name'=>$request->name,
        //     'description'=>$request->description,
        //     'category_id'=>$request->category
        // ]);
        return redirect('/posts')->with('status',config('ap.message.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post,Test $test)
    {
        // $data = Post::find($id);

        //Manuml
        // if($post->user_id != auth()->id()){
        //     abort(403);
        // }
         $this->authorize('view', $post);
        return view('show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // $post = Post::findOrFail($id);
       $category = Category::all();
          $this->authorize('view', $post);
        return view('edit',compact('post','category'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storePostRequest $request, Post $post)
    {
        // $request->validate([
        //     'name' => 'required|unique:posts|max:255',
        //     'description' => 'required|max:255',
        // ]);
        // $post->name = $request->name;
        // $post->description = $request->description;
        // $post->save();
        $post->update([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return redirect('/posts')->with('status','Post Successfull Updated');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Post::findOrFail($id)->delete();
        $post->delete();
        return redirect('/posts');
    }
}
