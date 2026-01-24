<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('parent_id')->orderBy('sort_order')->orderBy('id')->get();
        
        $category = null;
        if (request()->has('edit')) {
            $category = Category::findOrFail(request('edit'));
        }
        
        return view('categories.index', compact('categories', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'slug' => 'nullable|string|max:255|unique:categories',
            'description' => 'nullable|string|max:1000',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $slug = $request->slug ?: \Illuminate\Support\Str::slug($request->name);

        Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('categories.index')->with(['success' => 'Kategori berhasil disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        return redirect()->route('categories.index', ['edit' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            'slug' => 'nullable|string|max:255|unique:categories,slug,' . $id,
            'description' => 'nullable|string|max:1000',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category = Category::findOrFail($id);
        $slug = $request->slug ?: \Illuminate\Support\Str::slug($request->name);

        $category->update([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('categories.index')->with(['success' => 'Kategori berhasil diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with(['success' => 'Kategori berhasil dihapus!']);
    }
}
