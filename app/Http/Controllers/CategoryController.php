<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:categories,name'],
        ]);
        $category = new Category();
        $category->name = $request->name;
        $isSaved = $category->save();
        if ($isSaved) {
            return redirect('categories')->with('success', '!تم إضافة الصنف بنجاح');
        } else {
            return redirect('categories')->with('error', 'حدث خطأ أثناء إضافة الصنف، حاول مرة أخرى.');
        }
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:categories,name'],
        ]);
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        if ($category->save()) {
            return redirect('categories')->with('success', '!تم تعديل الصنف بنجاح');
        } else {
            return redirect('categories')->with('error', 'حدث خطأ أثناء تعديل الصنف، حاول مرة أخرى.');
        }
    }

    public function destroy($id)
    {
        $productExists = Product::where('category_id', $id)->exists();
        if ($productExists) {
            return back()->with('error', 'لا يمكن حذف الصنف لأنه مرتبط بمنتجات.');
        }
        Category::findOrFail($id)->delete();
        return back()->with('success', '!تم حذف الصنف بنجاح');
    }
}
