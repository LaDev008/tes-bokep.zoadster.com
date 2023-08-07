<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class CountryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $countries = Country::all();
    return view('admin.countries.index', compact('countries'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.countries.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255|unique:categories,name',
    ]);

    Country::create([
      'name' => $request->name,
      'slug' => str_replace(' ', '-', Str::lower($request->name)),
    ]);

    Session::flash('status', 'success');
    Session::flash('message', 'Berhasil Menambah Kategori Negara Baru');

    return redirect()->route('countries.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Country $country)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Country $country)
  {
    return view('admin.countries.edit', compact('country'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Country $country)
  {
    $request->validate([
      'name' => 'required|string|max:255|' . Rule::unique('countries')->ignore($country->id),
    ]);

    $country->name = $request->name;
    $country->slug = str_replace(' ', '-', Str::lower($request->name));
    $country->save();

    Session::flash('status', 'success');
    Session::flash('message', 'Berhasil Mengupdate Kategori Negara');

    return redirect(route('countries.index'));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Country $country)
  {
    $country->delete();

    Session::flash('status', 'warning');
    Session::flash('message', 'Berhasil Menghapus Kategori Negara');

    return redirect(route('countries.index'));
  }
}
