<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\PutRequest;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
class CategoryController extends Controller
{
    
    public function index()
    {
        $categories =Category::paginate(2);
        
        
        return view('Dashboard/category/index',compact('categories'));
        
    
    }
    public function create()
    {
        $category = new Category();
        return view('Dashboard.category.create',compact('category'));
    }
    public function store(StoreRequest $request)
    {
        Category::create($request->validated());
        return to_route('category.index');
    }
    public function show(Category $category)
    {
        return view('Dashboard/category/show',['category' => $category]);
    }
    public function edit(Category $category)
    {
        $categories = Category::pluck('id','title');
        return view('Dashboard.category.edit', compact('category'));
    }
    public function update(PutRequest $request, Category $category)
    {
                // $filename = time().data['image']->extension();
        if(isset($data['image'])){
            $data['image'] = $filename = time().'.'.$data['image']->extension();
            $request->image->move(public_path('uploads/categorys'),$filename);
        }
        $category->update($request->validated());
        return to_route('category.index');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('category.index');
    }
}
