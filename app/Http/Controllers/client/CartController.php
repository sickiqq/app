<?php

namespace App\Http\Controllers\client;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Table;
use App\Client;
use App\ClientTable;
use App\Product;
use App\Promotion;
use App\Category;
use App\Sale;
use App\SaleDetail;
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
      // dd(session()->get('user_name'));

      $table_id = 1;
      session()->put('table_id', $table_id);

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
        // view the cart items
        $items = Cart::getContent();
        $table_id = session()->get('table_id');

        //verifica si exista una boleta abierta
        $sale = Sale::where('table_id',$table_id)->where('status','open')->first();
        if ($sale == null) {
          //crea nueva boleta
          $sale = new Sale();
          $sale->table_id = $table_id;
          $sale->date = Carbon::now();
          $sale->save();
        }

        foreach($items as $item) {
          if ($item['associatedModel']->getTable() == "promotions") {
            $saleDetail = new SaleDetail();
            $saleDetail->client_id = session()->get('user_id');
            // $saleDetail->product_id = $item['attributes']['product_id'];
            $saleDetail->promotion_id = $item['attributes']['promotion_id'];
            $saleDetail->sale_id = $sale->id;
            $saleDetail->date = Carbon::now();
            $saleDetail->amount = $item->quantity;
            $saleDetail->price = $item->price;
            $saleDetail->save();
          }else{
            $saleDetail = new SaleDetail();
            $saleDetail->client_id = session()->get('user_id');
            $saleDetail->product_id = $item['attributes']['product_id'];
            // $saleDetail->promotion_id = $item['attributes']['promotion_id'];
            $saleDetail->sale_id = $sale->id;
            $saleDetail->date = Carbon::now();
            $saleDetail->amount = $item->quantity;
            $saleDetail->price = $item->price;
            $saleDetail->save();
          }
        }

        //se elimina info de carrito de compras
        foreach($items as $item) {
          Cart::remove($item['id']);
        }

        session()->flash('success', 'El pedido ha sido ingresado.');
        return redirect()->route('cart.index');
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
          'attributes' => array('product_id' => $product->id),
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
          'attributes' => array('promotion_id' => $promotion->id),
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

    public function add_client_name(Request $request)
    {
      try {
        //se crea un cliente nuevo (temporal)
        $client = new Client();
        $client->nickname = $request->user_name;
        $client->save();

        //crea variable session
        session()->put('user_name', $request->user_name);
        session()->put('user_id', $client->id);

        //pendiente crear una variable para identificar si ya esta registrado el correo y otros datos adicionales

        //se guarda cliente en mesa
        $clientTable = new ClientTable();
        $clientTable->client_id = $client->id;
        $clientTable->table_id = session()->get('table_id');
        // $clientTable->user_name = $request->user_name;
        $clientTable->entry_date = Carbon::now();
        $clientTable->save();

      } catch (\Exception $e) {
        Storage::put('errores.txt', $e->getMessage());
      }
    }

    // public function remove_user(Request $request)
    // {
    //   try {
    //     //crea variable session
    //     session()->put('user_name', $request->user_name);
    //
    //     //se crea un cliente nuevo (temporal)
    //     $client = new Client();
    //     $client->name = $request->user_name;
    //     $client->save();
    //
    //     //se guarda cliente en mesa
    //     $clientTable = new ClientTable();
    //     $clientTable->client_id = $client->id;
    //     $clientTable->table_id = session()->get('table_id');
    //     $clientTable->entry_date = Carbon\Carbon::now();
    //     $clientTable->save();
    //
    //   } catch (\Exception $e) {
    //     Storage::put('errores.txt', $e->getMessage());
    //   }
    // }




}
