<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function deletePost(Post $post){
        if(auth()->user()->id === $post['user_id']){     // so that only autor can delete and see it.
            $post->delete();
        }
        return redirect('/');
    }


     public function actuallyUpdatedPost(Post $post, Request $request){
        if(auth()->user()->id !== $post['user_id']){     // so that only autor can perform and see it.
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);
        return redirect('/');

     }



    public function showEditScreen(Post $post){
        if(auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }
       return view('edit-post', ['post' => $post]);
    }



    public function createPost(Request $request){
      $incomingFields = $request->validate([
        'title' => 'required',
        'body' => 'required'
      ]);

     $incomingFields['title'] = strip_tags($incomingFields['title']);  // so that user can not use html in title input box
     $incomingFields['body'] = strip_tags($incomingFields['body']);
     $incomingFields['user_id'] = auth()->id();
     Post::create($incomingFields);
     return redirect('/');

    }
}
