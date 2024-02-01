<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function index()
    {
        return view('products.index', ['products' => Product::all(['id', 'name', 'description', 'price'])]);
    }

    public function create()
    {
        return view('products.create', ['categories' => Category::all()]);
    }

    public function edit(Product $product)
    {
        $productCategories = $product->categories->pluck('id')->toArray();
        return view('products.edit', ['product' => $product, 'categories' => Category::all(), 'productCategories' => $productCategories]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:45|string',
            'description' => 'required|max:1000|string',
            'price' => 'required|numeric',
            'category_ids.*' => 'required|exists:categories,id',
            'category_ids' => 'required|array',
            ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $product = new Product();

        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];
        $product->save();

        $product->categories()->attach($validated['category_ids']);

        return redirect()->route('products.index');
    }

    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:45|string',
            'description' => 'required|max:1000|string',
            'price' => 'required|numeric|max:1000',
            'category_ids.*' => 'required|exists:categories,id',
            'category_ids' => 'required|array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();
        $product->update($validated);
        $product->categories()->sync($validated['category_ids']);
        return redirect()->route('products.show', $product);

    }

    public function show(Product $product)
    {
//        $product->load('categories');
//        dd($product->categories);

        $productCategories = $product->categories->toArray();

//        $id = $product->id;
//        $product = Product::query()->with(['categories' => function(BelongsToMany $query) {
//            $query->where('name', 'possimus');
//        }])->where('id', $id)->first();

        return view('products.show', ['product' => $product, 'categories' => $productCategories]);
    }

    public function destroy(Product $product)
    {
        $product->categories()->sync([]);
        $product->delete();

        return redirect()->route('products.index');
    }
}
