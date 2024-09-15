<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Posts;
use App\Models\Users;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    // public function index(Request $request)
    // {
    //     // $search = $request->input('search', '');
    //     // if ($search !== "") {
    //     //     $posts = Posts::where('title', 'LIKE', "%{$search}%")
    //     //         ->orWhere('author', 'LIKE', "%{$search}%")
    //     //         ->orWhere('category', 'LIKE', "%{$search}%")
    //     //         ->paginate(10);
    //     // } else {
    //     //     $posts = Posts::paginate(12);
    //     // }

    //     // $data = compact('posts', 'search');
    //     $posts = Posts::with('category')->paginate(10);
    //     $data = compact('posts');
    //     return view('frontend.index')->with($data);
    // }

    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $posts = Posts::where('title', 'LIKE', "%{$search}%")
                ->orWhereHas('category', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                })
                ->latest()
                ->paginate(10);
        } else {
            $posts = Posts::latest()->paginate(12);
        }

        $data = compact('posts');
        return view('frontend.index')->with($data);
    }


    public function readPost($pid)
    {
        $post = Posts::with('category')->latest()->find($pid);
        $data = compact('post');
        return view('frontend.read')->with($data);
    }

    public function categorySearch($cid = null)
    {
        if ($cid) {
            $posts = Posts::where('category_id', $cid)->with('category')->paginate(12);
        } else {
            $posts = Posts::with('category')->latest()->paginate(12);
        }

        $categories = Category::all();

        return view('frontend.index', compact('posts', 'categories'));
    }

}
