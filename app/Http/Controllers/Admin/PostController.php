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
            return view('admin.pages.posts.edit', compact('post', 'page_title'));
        }catch(\Exception $e){
            return redirect()->back()->with(['error' => "Somthing wrong happend. Please try again later"]);
        }

    }

    public function updatePost(Request $request){
        // dd($request->all());
        try{
            if ($request->hasFile('user_image')) {
                $file = $request->file('user_image');
                $imageName = uniqid() . "." . $file->getClientOriginalExtension();
                $path = public_path('posts/images');
                $file->move($path, $imageName);
            }

            $id = $request->post_id;
            $post = Post::find($id);
            $post->post_text = $request->post_text;
            if($request->hasFile('user_image')){
                $post->post_image = asset('posts/images/'.$imageName);
            }
            if($post->save()){
                return redirect()->back()->with(['success' => "Post updated successfully"]);
            }
        }catch(\Exception $e){
            return redirect()->back()->with(['error' => "Somthing wrong happend. Please try again later"]); 
        }
    }
}
