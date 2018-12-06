<?php

namespace App\Http\Controllers;
use \App\Blog;
use Request, Validator, DB;

class BlogsController extends Controller
{
    public function index(){
    	// $category = [1 => 'Tips', 2 => 'Technology', 3 => 'Health', 4 => 'Politics', 5 => 'Review'];

    	$blogs = Blog::latest()->get();
    	return view('blogs.index', compact('blogs'));
    	   // with('category', $category);

    }
    public function create(){
        return view('blogs.create'); 
    }

     public function show($id){
        $blogs = Blog::findorfail($id);
        return view('blogs.show', compact('blogs'));
        //return $id;
     }
     public function store(){
        $inputs = Request::all();

        $rules = [
            'title' => 'required|min:3',
            'body' => "required",
        ];

        $err_msgs = [
            'title.required' => 'Blog must have a title',
            'title.min' => 'Blog title must have atleast 3 character',
            'body.required' => 'Blog must have a body',
        ];

        $validator = Validator::make(Request::all(), $rules, $err_msgs);

        if ($validator->fails()) {
            return redirect()->back()
            ->withInput(Request::all())
            ->withErrors($validator);
        }
        Blog::create($inputs);
        return redirect('blogs');
     }
     public function edit($id){
        $inputs = Request::all();
        $blogs = Blog::find($id);
        $blogs -> fill(Request::all());
        //$article -> title =  $inputs['title'];
        //$article -> body = $inputs['body'];
        $blogs->save();

        return redirect('blogs');
     }
     public function category($category){
        $blogs = DB::table('blogs')->where('category', $category)->get();
        return view('blogs.category', compact('blogs'));
     }
}
