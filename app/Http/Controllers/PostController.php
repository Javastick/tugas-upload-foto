<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Image;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('welcome', [
            'posts' => $posts
        ]);
    }

    public function upload(Request $request){
        $imagePath = request('image')->store('profile', 'public');
        // dd($request->description);
        Post::create([
            'image' => $imagePath,
            'title' => $request->title,
            'desctiption' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
        return redirect('/');
    }
}
