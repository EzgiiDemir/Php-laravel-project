<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use Auth;

class postcontroller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('post');
    }
    public function create(){
        $posts = post::all();

        return view('create', compact('posts'));
    }

    public function insert(Request $request){

        $image=$request->file('image');
        if ($image){

            $image_name=rand(100,1000);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/post/';
            $image->move($upload_path,$image_full_name);
            $image_url=$upload_path.$image_full_name;
            $image=$image_url;


        }

        post::create([
            'User_id'=>Auth::id(),
            'title'=>$request->title,
            'desc'=>$request->desc,
            'image'=>$image
        ]);
        $posts = post::all();

        return redirect()->route('create.post')->with(['posts'=>$posts]);
    }
    public function show($id){
        $post = post::where('id', $id)->first();

        return view('show', compact('post'));
    }
    public function delete($id){
        $post=post::findOrFail($id);
        $post->delete();
        return redirect()->route('create.post')->withErrors(['msg'=>'Deleted succesfully!']);
    }
    }

