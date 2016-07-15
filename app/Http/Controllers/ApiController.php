<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\User;
use App\Blog;
use Validator;


class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

   
    public function getBlog(){
        $blogs = Blog::all();

        return response()->json($blogs, 200);
    }

    public function create(Request $request){
        $blogs = Blog::all();

        $blog = Blog::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
        ]);

        return response()->json($blog, 200);
    }

    public function edit(Request $request, $id){
        $blog = Blog::find($id);

        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->content = $request->content;
        $blog->save(); 

        return response()->json($blog, 200);
    }

    public function delete(Request $request, $id){
        $blog = Blog::find($id);
        $blog->delete();
        return response()->json(['status' => 'Deleted'], 200);
    }


}
