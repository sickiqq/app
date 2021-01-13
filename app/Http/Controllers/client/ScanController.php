<?php

namespace App\Http\Controllers\client;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Table;
use App\Product;
use App\Promotion;
use App\Category;
use Session;

class ScanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("client.qr_page");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function read_qr($table_id)
    {
      session()->put('table_id', $table_id);
      $table = Table::find($table_id);
      $products = Product::where('branch_office_id',$table->branchOffice->id)->get();
      $promotions = Promotion::where('branch_office_id',$table->branchOffice->id)->get();

      $products_array = array();
      foreach ($products as $key => $product) {
        $products_array[$product->subcategory->category->name][$product->subcategory->name][$product->name] = $product;
      }

      return view("client.product_menu",compact('table','products','promotions','products_array'));
    }

}
