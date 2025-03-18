<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:products,name'],
            'quantity' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'integer', 'min:0'],
            'category' => ['required', 'exists:categories,id'],
            'description' => ['required', 'string'],
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->description = $request->description;

        if ($product->save()) {
            return redirect('products')->with('success', '!تم إضافة المنتج بنجاح');
        } else {
            return redirect('products')->with('error', 'حدث خطأ أثناء إضافة المنتج، حاول مرة أخرى.');
        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:products,name,' . $id],
            'quantity' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'integer', 'min:0'],
            'category' => ['required', 'exists:categories,id'],
            'description' => ['required', 'string'],
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->description = $request->description;

        if ($product->save()) {
            return redirect('products')->with('success', '!تم تعديل المنتج بنجاح');
        } else {
            return redirect('products')->with('error', 'حدث خطأ أثناء تعديل المنتج، حاول مرة أخرى.');
        }
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->delete()) {
            return back()->with('success', '!تم حذف المنتج بنجاح');
        } else {
            return back()->with('error', 'حدث خطأ أثناء حذف المنتج، حاول مرة أخرى.');
        }
    }
}
