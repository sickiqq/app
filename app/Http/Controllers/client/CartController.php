<?php

namespace App\Http\Controllers\client;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Table;
use App\ClientTable;
use App\Product;
use App\Promotion;
use App\Category;
use Cart;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $table_id = session()->get('table_id');

      // $table_id = 1;
      if ($table_id == null) {
        session()->flash('warning', 'Debe seleccionar una mesa.');
        return redirect()->back();
      }

      $table = Table::find($table_id);
      $products = Product::where('branch_office_id',$table->branchOffice->id)->get();
      $promotions = Promotion::where('branch_office_id',$table->branchOffice->id)->get();

      $products_array = array();
      foreach ($products as $key => $product) {
        $products_array[$product->subcategory->category->name][$product->subcategory->name][$product->name] = $product;
      }

      return view("client.product_menu",compact('table','products','promotions','products_array'));
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
        // // view the cart items
        // $items = Cart::getContent();
        // foreach($items as $item) {
        //
        //   if ($item['associatedModel']->getTable() == "promotions") {
        //
        //     $promotion = new Promotion($request->All());
        //     $promotion->save();
        //
        //     session()->flash('success', 'La categoría ha sido creada.');
        //     return redirect()->route('categories.index');
        //   }
        //
        // // echo $row->id; // row ID
        // // echo $row->name;
        // // echo $row->qty;
        // // echo $row->price;
        // // echo ;
        // }
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

    public function add_product_to_cart(Request $request, Product $product)
    {
        // dd($request);
        // $userID = Auth::user()->id; // the user ID to bind the cart contents

        // add the product to cart
        Cart::add(array(
          'id' => "produ".$product->id,
          'name' => $product->name,
          'price' => $product->price,
          'quantity' => 1,
          'attributes' => array(),
          'associatedModel' => $product
        ));

        session()->flash('info', 'Se agregó el producto al carrito de compras.');
        return redirect()->back();
    }

    public function add_promotion_to_cart(Request $request, Promotion $promotion)
    {
        // add the product to cart
        Cart::add(array(
          'id' => "promo".$promotion->id,
          'name' => $promotion->name,
          'price' => $promotion->price,
          'quantity' => 1,
          'attributes' => array(),
          'associatedModel' => $promotion
        ));

        session()->flash('info', 'Se agregó la promoción al carrito de compras.');
        return redirect()->back();
    }

    public function checkout(Request $request)
    {
        // session()->flash('info', 'Se agregó el producto al carrito de compras.');
        // return redirect()->back();
        return view('client.checkout');
    }

    public function remove_product_from_cart(Request $request, Product $product)
    {
      // dd($product);
        Cart::remove("produ".$product->id);

        session()->flash('info', 'Se eliminó el producto del carrito de compras.');
        return redirect()->back();
    }

    public function remove_promotion_from_cart(Request $request, Promotion $promotion)
    {
        Cart::remove("promo".$promotion->id);

        session()->flash('info', 'Se eliminó la promoción del carrito de compras.');
        return redirect()->back();
    }


}
