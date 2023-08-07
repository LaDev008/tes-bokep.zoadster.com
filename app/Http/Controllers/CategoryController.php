<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $categories = Category::all();
    return view('admin.categories.index', compact('categories'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.categories.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255|unique:categories,name',
    ]);

    Category::create([
      'name' => $request->name,
      'slug' => str_replace(' ', '-', Str::lower($request->name)),
    ]);

    Session::flash('status', 'success');
    Session::flash('message', 'Berhasil Menambah Kategori Baru');

    return redirect()->route('categories.index');
  }

  /**
   * Display the specified resource.
   */
  public function show($slug)
  {
    $category = Category::with('videos')->firstWhere('slug', $slug);

    return view('guest.category.show', compact('category'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Category $category)
  {
    return view('admin.categories.edit', compact('category'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Category $category)
  {
    $request->validate([
      'name' => 'required|string|max:255|' . Rule::unique('categories')->ignore($category->id),
    ]);

    $category->name = $request->name;
    $category->slug = str_replace(" ", '-', Str::lower($request->name));
    $category->save();

    Session::flash('status', 'success');
    Session::flash('message', 'Berhasil Mengupdate Kategori');

    return redirect(route('categories.index'));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Category $category)
  {
    $category->delete();

    Session::flash('status', 'warning');
    Session::flash('message', 'Berhasil Menghapus Kategori');

    return redirect(route('categories.index'));
  }
}
