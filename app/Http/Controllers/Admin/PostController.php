<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_uz' => 'required',
            'title_ru' => 'required',
            'category_id' => 'required',
            'body_uz' => 'required',
            'body_ru' => 'required',
        ]);
          $requestData = $request->except('tags');
          if (empty($request->is_special)) {
              $requestData['is_special'] = 0;
          }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/admin/images'), $imageName);
            $requestData['image'] = $imageName;
        }
        $requestData['slug'] = Str::slug($requestData['title_ru']);
        $post = Post::create($requestData);
        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }
       return redirect()->route('admin.post.index')->with('success', 'Post added!');
    }


    /**
     * Display the specified resource.
     * ..
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title_uz' => 'required',
            'title_ru' => 'required',
            'category_id' => 'required',
            'body_uz' => 'required',
            'body_ru' => 'required',
        ]);
        $requestData = $request->except('tags');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/admin/images'), $imageName);
            $requestData['image'] = $imageName;
        }
        $requestData['slug'] = Str::slug($requestData['title_uz']);
        $post->update($requestData);
        $post->tags()->sync($request->tags);
        return redirect()->route('admin.post.index')->with('success', 'Post edit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index')->with('success', 'Post deleted!');
    }
}
