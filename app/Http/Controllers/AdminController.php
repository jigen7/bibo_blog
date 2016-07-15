<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\User;
use App\Blog;
use Validator;


class AdminController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();

        return view('blog_admin/admin-home')->with('blogs', $blogs);
    }

    public function insertPostPage(){
        return view('blog_admin/admin-insert');
    }


    public function insertPost(Request $request)
    {
        Blog::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
        ]);

        return Redirect::action('AdminController@index')->with('status', 'New Post Inserted!!');
    }

    public function viewPost(Request $request){

        $id = $request->id;

        $blog = Blog::find($id);

        return view('blog_admin/admin-crud')->with('blog', $blog);

    }


    public function updatePost(Request $request){

        $id = $request->postid;

        $blog = Blog::find($id);

        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->content = $request->content;
        $blog->save(); 

       return Redirect::action('AdminController@index')->with('status', 'Post Updated!!'); 
    }

    public function deletePost(Request $request){
        $id = $request->postid;
        $blog = Blog::find($id);
        $blog->delete();

        return Redirect::action('AdminController@index')->with('status', 'Post Deleted!!'); 

    }


}
