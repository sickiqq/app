<?php

namespace App\Http\Controllers\parameters;
use App\Http\Controllers\Controller;
use App\PromotionItem;

use Illuminate\Http\Request;

class PromotionItemController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
      // $promotions = Promotion::orderBy('id','ASC')->get();
      // return view('parameters.promotions.index', compact('request', 'promotions'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    // $branchOffices = branchOffice::orderBy('name','ASC')->get();
    // return view('parameters.promotions.create', compact('branchOffices'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      // $promotion = new Promotion($request->All());
      // $promotion->save();
      //
      // session()->flash('info', 'La promoción ha sido creada.');
      // return redirect()->route('promotions.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function show(PromotionItem $promotionItem)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function edit(PromotionItem $promotionItem)
  {
    // $branchOffices = branchOffice::orderBy('name','ASC')->get();
    // return view('parameters.promotions.edit', compact('promotion','branchOffices'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, PromotionItem $promotionItem)
  {
    // $promotion->fill($request->all());
    // $promotion->save();
    //
    // session()->flash('info', 'La promoción ha sido editada.');
    // return redirect()->route('promotions.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy(PromotionItem $promotionItem)
  {
    // $promotion->delete();
    // session()->flash('success', 'La promoción ha sido eliminada');
    // return redirect()->route('promotions.index');
  }
}
