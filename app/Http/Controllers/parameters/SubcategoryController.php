<?php

namespace App\Http\Controllers\Parameters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Subcategory;

class SubcategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
      $subcategories = Subcategory::orderBy('id','ASC')->get();
      return view('parameters.subcategories.index', compact('request', 'subcategories'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Category::orderBy('name','ASC')->get();
    return view('parameters.subcategories.create', compact('categories'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $subcategory = new Subcategory($request->All());
      $subcategory->save();

      session()->flash('success', 'La categoría ha sido creada.');
      return redirect()->route('subcategories.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function show(Subcategory $subcategory)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function edit(Subcategory $subcategory)
  {
    $categories = Category::orderBy('name','ASC')->get();
    return view('parameters.subcategories.edit', compact('subcategory','categories'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Subcategory $subcategory)
  {
    $subcategory->fill($request->all());
    $subcategory->save();

    session()->flash('success', 'La categoría ha sido editada.');
    return redirect()->route('subcategories.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy(Subcategory $subcategory)
  {
    $subcategory->delete();
    session()->flash('success', 'La categoría ha sido eliminada');
    return redirect()->route('subcategories.index');
  }
}
