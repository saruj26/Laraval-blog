<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        $title = "Sarujanan";
        $posts = $this->getPosts();
       return view('posts.index', compact('title','posts'));
    }

    private function getPosts(){
        return json_decode(json_encode([
            ['id' => 1, 'title' => 'First Post', 'content' => 'This is the content of the first post.'],
            ['id' => 2, 'title' => 'Second Post', 'content' => 'This is the content of the second post.'],
            ['id' => 3, 'title' => 'Third Post', 'content' => 'This is the content of the third post.'],
        ]));

    }

    public function detail($id){
        $posts = $this->getPosts();
        $post = collect($posts)->firstWhere('id', $id);
        return view('posts.detail', compact( 'post'));
    }

    public function oldUrl(){
        return redirect()->route('new_url');
    }

    public function newUrl(){
        return "<h1> New Url page </h1>";
    }
}
