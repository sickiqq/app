<?php

namespace App\Http\Controllers\parameters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Waiter;

class WaiterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $waiters = Waiter::orderBy('name','ASC')->get();
      return view("parameters.waiters.index",compact('waiters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parameters.waiters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $waiter = new Waiter($request->All());
      $waiter->save();

      session()->flash('info', 'El mesero ha sido creado.');
      return redirect()->route('waiters.index');
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
    public function edit(Waiter $waiter)
    {
        return view('parameters.waiters.edit', compact('waiter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Waiter $waiter)
    {
      $waiter->fill($request->all());
      $waiter->save();

      session()->flash('info', 'El mesero ha sido editado.');
      return redirect()->route('waiters.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Waiter $waiter)
    {
      $waiter->delete();
      session()->flash('success', 'El mesero ha sido eliminado');
      return redirect()->route('waiters.index');
    }
}
