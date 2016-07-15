<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\User;
use App\Blog;
use App\Comment;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


class BlogController extends Controller
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
        $blogs = Blog::all();

        return view('blog_content/index')->with('blogs', $blogs);
    }

    public function about(){
        return view('blog_content/about');
    }

    public function contact(){
        return view('blog_content/contact');
    }

    public function view(Request $request){

        $id = $request->id;
        $blog = Blog::find($id);
        $comments = Comment::where('blog_id', $id)->get();

        $arr['blog'] = $blog;
        $arr['comments'] = $comments;

        return view('blog_content/post')->with('arr', $arr);
    }

    public function insertComment(Request $request){
       
        $user = 1;
        if($request->user()){
           $user = $request->user()->id;
        }



        Comment::create([
            'content' => $request->comment,
            'blog_id' => $request->postid,
            'user_id' => $user, 
        ]);

        return Redirect::back();
    }

    


}
