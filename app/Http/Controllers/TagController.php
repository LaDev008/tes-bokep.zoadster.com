<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $tags = Tag::all()->sortBy('name');

    return view('admin.tags.index', compact('tags'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.tags.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
    ]);

    Tag::create([
      'name' => $request->name,
      'slug' => str_replace(' ', '-', Str::lower($request->name)),
    ]);

    Session::flash('status', 'success');
    Session::flash('message', 'BERHASIL MENAMBAH TAG BARU');

    return redirect(route('tags.index'));
  }

  /**
   * Display the specified resource.
   */
  public function show($slug)
  {
    $tag = Tag::with('videos')->firstWhere('slug', $slug);
    $other_tag = Tag::with('videos')->get()->sortByDesc('views')->take(3);


    return view('guest.tag.show', compact('tag', 'other_tag'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Tag $tag)
  {
    return view('admin.tags.edit', compact('tag'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Tag $tag)
  {
    $validated = $request->validate([
      'name' => 'required|string|max:255',
    ]);

    $tag->name = $validated['name'];
    $tag->slug = str_replace(' ', '-', Str::lower($validated['name']));
    $tag->save();

    Session::flash('status', 'success');
    Session::flash('message', 'Berhasil Mengubah Nama Tag');

    return redirect(route('tags.index'));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Tag $tag)
  {
    $tag->delete();

    Session::flash('status', 'warning');
    Session::flash('message', 'Berhasil Menghapus Tag');

    return redirect(route('tags.index'));
  }
}
