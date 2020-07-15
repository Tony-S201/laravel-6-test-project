<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($slug) {
        $post = \DB::table('posts')->where('slug', $slug)->first();

        if($post == null) {
            abort('404', 'The post does not exist');
        }

        return view('post', [
            'post_title' => $post->slug,
            'post_text' => $post->body
        ]);
    }
}
