<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    {
        $post= Post::find(2);
        $category=Category::find(1);
        dd($category->posts[0]->title);
        // $post->update(
        // [
        //     'title'=>'test title new',
        //     'slug'=>'test slug',
        //     'content'=>'test content',
        //     'image'=>'test image']
        // );
        //
            // $post=Post::create(
            //     [
            //         'title'=>'test title',
            //         'slug'=>'test slug',
            //         'content'=>'test content',
            //         'category_id'=>1,
            //         'description'=>'test Description',
            //         'posted'=>'not',
            //         'image'=>'test image']
            //     );
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
