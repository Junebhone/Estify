<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(12);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        if (Storage::exists('public/temp/' . $request->image)) {
            Storage::move('public/temp/' . $request->image, 'public/categories/' . Str::remove('tmp-', $request->image));
        }
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => Str::remove('tmp-', $request->image)
        ]);


        return redirect()->route('admin.categories.index')->with('noti', ["icon" => "success", "title" => "Category Successfully Created"]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        if ($request->image) {
            if (Storage::exists('public/temp/' . $request->image)) {
                Storage::move('public/temp/' . $request->image, 'public/categories/' . Str::remove('tmp-', $request->image));
                $category->image = Str::remove('tmp-', $request->image);
            }
        }
        $category->update();
        return redirect()->route('admin.categories.index')->with('noti', ["icon" => "success", "title" => "Category Successfully Edited"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Storage::delete('public/categories' . '/' . $category->image);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('noti', ["icon" => "success", "title" => "Category Successfully Deleted"]);
    }

    public function add_sub(Category $category)
    {
        return view('admin.categories.add_sub', compact('category'));
    }
    public function add_sub_store(Request $request, Category $category)
    {

        if (Storage::exists('public/temp/' . $request->image)) {
            Storage::move('public/temp/' . $request->image, 'public/subcategories/' . Str::remove('tmp-', $request->image));
        }
        $category->sub_categories()->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $category->id,
            'image' => Str::remove('tmp-', $request->image)
        ]);


        return redirect()->route('admin.categories.index')->with('noti', ["icon" => "success", "title" => "SubCategory Successfully Created"]);
    }
}