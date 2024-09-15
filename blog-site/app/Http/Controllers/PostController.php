<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use Illuminate\Http\Request;
use Storage;

class PostController extends Controller
{
    // public function index()
    // {
    //     $posts = Posts::with('category')->paginate(10); 
    //     $data = compact('posts');
    //     return view('adminpanel.dashboard')->with($data);
    // }

    // In PostController.php
    public function index()
    {
        if (auth()->check()) {
            $user = auth()->user();

            if ($user->role == 1) {
                // Admin
                $posts = Posts::paginate(10);
            } elseif ($user->role == 0) {
                // Contributor
                $posts = Posts::where('author', $user->email)->paginate(10);
            }
        } else {
            // Guest
            $posts = Posts::paginate(10);
        }

        $data = compact('posts');
        return view('adminpanel.dashboard')->with($data);
    }


    public function postPage()
    {
        $categories = Category::all();
        $data = compact('categories');
        return view('adminpanel.add-post')->with($data);
    }

    public function addPost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'author' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $post = new Posts();

        if ($request->hasFile('image')) {
            $fileName = time() . "-NewsPulse." . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/image', $fileName);
            $post->image = 'storage/image/' . $fileName;
        }

        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->category_id = $request->input('category');
        $post->author = $request->input('author');
        $post->save();

        return redirect()->route('dashboard');
    }

    public function postDel($pid)
    {
        $post = Posts::find($pid);
        $post->delete();
        return redirect()->route('dashboard');
    }

    public function postUpdate($pid)
    {
        $post = Posts::find($pid);
        $categories = Category::all();
        $data = compact('post', 'categories');
        return view('adminpanel.update-post')->with($data);
    }

    public function editPost(Request $request, $pid)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'author' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $post = Posts::find($pid);

        if (!$post) {
            return redirect()->route('dashboard')->with('error', 'Post not found');
        }

        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->category_id = $request->input('category');
        $post->author = $request->input('author');

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::delete(str_replace('storage/', 'public/', $post->image));
            }

            $fileName = time() . "-NewsPulse." . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/image', $fileName);
            $post->image = 'storage/image/' . $fileName;
        }

        $post->save();

        return redirect()->route('dashboard')->with('success', 'Post updated successfully');
    }

    // public function myPosts()
// {
//     $user = auth()->user();
//     $posts = Posts::where('author_id', $user->uid)->get();

    //     return view('my-posts', compact('posts'));
// }


}
