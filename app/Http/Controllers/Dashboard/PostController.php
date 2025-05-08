<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
class PostController extends Controller
{
    
    public function index()
    {
        $posts =Post::paginate(2);
        
        
        return view('Dashboard/post/index',compact('posts'));
        
        // $post->update(
        // [
        //     'title'=>'test title new',
        //     'slug'=>'test slug',
        //     'content'=>'test content',
        //     'image'=>'test image']
        // );
        //
        //----------------------
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
        $categories= Category::pluck('id','title');
        $post = new Post();
        return view('Dashboard.post.create',compact('categories','post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Post::create($request->validated());
        return to_route('post.index');
        // $validated = Validator::make($request->all(),[
        //         'title'=>'required|min:5|max:500',
        //         'slug'=>'required|min:5|max:500',
        //         'content'=>'required|min:7',
        //         'category_id'=>'required|integer',
        //         'decription'=>'required|min:7',
        //         'posted'=>'required'
        // ]);
        // dd($validated);
        //----------------------------------
        // $request->validate([
        //     'title'=>'required|min:5|max:500',
        //     'slug'=>'required|min:5|max:500',
        //     'content'=>'required|min:7',
        //     'category_id'=>'required|integer',
        //     'decription'=>'required|min:7',
        //     'posted'=>'required'
        // ]);
        
        
        // $post=Post::create(
        //         [
        //             'title'=>$request->all()['title'],
        //             'slug'=>$request->all()['slug'],
        //             'content'=>$request->all()['content'],
        //             'category_id'=>$request->all()['category_id'],
        //             'description'=>$request->all()['description'],
        //             'posted'=>$request->all()['posted'],
        //             'image'=>$request->all()['image']]
        //          );
        // dd(request()->get('title'));
        // dd($request->>all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('Dashboard/post/show',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id','title');
        return view('Dashboard.post.edit', compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        // $filename = time().data['image']->extension();
        if(isset($data['image'])){
            $data['image'] = $filename = time().'.'.$data['image']->extension();
            $request->image->move(public_path('uploads/posts'),$filename);
        }
        $post->update($data);
        return to_route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('post.index');
    }
}
