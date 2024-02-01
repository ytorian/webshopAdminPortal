<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatagoriesController extends Controller
{
    public function index() {
        return view('categories.index', ['categories' => Category::all()]);
    }

    public function create() {
        return view('categories.create');
    }

    public function edit(Category $category) {
        return view('categories.edit', ['category' => $category]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:45|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $category = new Category();
        $category->name = $validated['name'];
        $category->save();

        return redirect()->route('categories.index');
    }

    public function show(Category $category) {
        return view('categories.show', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:45|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $category->update($validated);

        return redirect()->route('categories.show', ['category' => $category]);
    }

    public function destroy(Category $category)
    {
        $category->products()->sync([]);
        $category->delete();

        return redirect()->route('categories.index');
    }
}
