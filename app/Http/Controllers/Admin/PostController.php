<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends MainAdminController
{

    // ============== Admin functions ====================

    public function list(){

        try{
            $page_title=trans('words.posts');
            $posts = Post::with('user', 'likes', 'comments')->get();
            // dd($posts);
            return view('admin.pages.posts.list', compact('page_title', 'posts'));
        }catch(\Exception $e){
            return redirect()->back()->with(['error' => "Somthing wrong happend. Please try again later"]);
        }
        
    }

    public function showEdit($id){
        try{
            $page_title = "Edit Post";
            $post = Post::where('id', $id)->first();
            // dd($post);
            return view('admin.pages.posts.edit', compact('post', 'page_title'));
        }catch(\Exception $e){
            return redirect()->back()->with(['error' => "Somthing wrong happend. Please try again later"]);
        }

    }
}
