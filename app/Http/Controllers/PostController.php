<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $post = new Post();
        $post->title = request('title');
        $post->content = request('content');
        $post->save();
        $post = ['title' => $post->title, 'content' => $post->content];
        PostCreated::dispatch($post);
        // return redirect()->back()->withSuccess('Post Created Successfully!');
        // $userCache = Cache::put('posts', $post, 10);

        return redirect('/get-cache');
    }

    public function getCache()
    {
        $users = Cache::get('users');
        return $users;
    }
}
