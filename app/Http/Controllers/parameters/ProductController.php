<?php

namespace App\Http\Controllers\Parameters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Subcategory;
use App\branchOffice;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
      $products = Product::orderBy('id','ASC')->get();
      return view('parameters.products.index', compact('request', 'products'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $subcategories = Subcategory::orderBy('name','ASC')->get();
    $branchOffices = branchOffice::orderBy('name','ASC')->get();
    return view('parameters.products.create', compact('subcategories','branchOffices'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $product = new Product($request->All());
      $product->save();

      session()->flash('info', 'La categoría ha sido creada.');
      return redirect()->route('products.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function show(Product $product)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function edit(Product $product)
  {
    $subcategories = Subcategory::orderBy('name','ASC')->get();
    $branchOffices = branchOffice::orderBy('name','ASC')->get();
    return view('parameters.products.edit', compact('product','subcategories','branchOffices'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Product $product)
  {
    $product->fill($request->all());
    $product->save();

    session()->flash('info', 'La categoría ha sido editada.');
    return redirect()->route('products.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy(Product $product)
  {
    $product->delete();
    session()->flash('success', 'La categoría ha sido eliminada');
    return redirect()->route('products.index');
  }
}
