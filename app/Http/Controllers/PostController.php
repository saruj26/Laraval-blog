<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index()
    {
        $title = "Sarujanan";
        // $posts = $this->getPosts();
        $posts = Post::all();

        return view('posts.index', compact('title', 'posts'));
    }

    // private function getPosts(){
    //     return json_decode(json_encode([
    //         ['id' => 1, 'title' => 'First Post', 'content' => 'This is the content of the first post.'],
    //         ['id' => 2, 'title' => 'Second Post', 'content' => 'This is the content of the second post.'],
    //         ['id' => 3, 'title' => 'Third Post', 'content' => 'This is the content of the third post.'],
    //     ]));

    // }

    public function detail($slug)
    {

        try {
            // Use findOrFail so Eloquent throws ModelNotFoundException when the post is missing
            $post = Post::where('slug', $slug)->firstOrFail();
            return view('posts.detail', compact('post'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $ex) {
            // Return a 404 view when the model isn't found
            return response()->view('errors.404', [], 404);
        }
        // $posts = $this->getPosts();

    }

    public function oldUrl()
    {
        return redirect()->route('new_url');
    }

    public function newUrl()
    {
        return "<h1> New Url page </h1>";
    }
}
