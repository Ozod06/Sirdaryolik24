<?php

namespace App\Http\Controllers;

use App\Mail\Message;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function index(){

        $specialPosts = Post::where('is_special',1)->limit(6)->get();
        $lastPosts = Post::limit(6)->latest()->get();
        return view('index', compact('specialPosts','lastPosts'));
    }

    public function categoryPosts($slug){
        $category = Category::where('slug',$slug)->firstOrFail();
        $posts = $category->posts()->paginate(2);
        return view('categoryPosts', compact('category','posts'));
    }

    public function contact(){
        return view('contact');
    }

    public function sendEmail(Request $request){

        $data = $request->all();
        Mail::to('ozod80785@gmail.com')->send(new Message($data));
        return 'OK';
        return redirect()->route('contact')->with('success', 'Your message has been sent');

    }

    public function postDetail($slug){
        $post = Post::where('slug',$slug)->firstOrFail();
        return view('postDetail', compact('post'));
    }

    public function search(Request $request)
    {
        $key = $request->key;
        $posts = Post::where('title_uz','like','%'.$key.'%')
         ->orWhere('title_ru','like','%'.$key.'%')
            ->orWhere('body_uz','like','%'.$key.'%')
            ->orWhere('body_ru','like','%'.$key.'%')->get();
        return view('search',compact('posts','key'));

    }
}
