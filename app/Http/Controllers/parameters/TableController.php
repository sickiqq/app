<?php

namespace App\Http\Controllers\parameters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Table;
use App\BranchOffice;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {
         $tables = Table::orderBy('id','ASC')->get();
         return view('parameters.tables.index', compact('request', 'tables'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
       $branchOffices = BranchOffice::orderBy('name','ASC')->get();
       return view('parameters.tables.create', compact('branchOffices'));
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         $table = new Table($request->All());
         $table->save();

         session()->flash('success', 'La mesa ha sido creada.');
         return redirect()->route('tables.index');
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
     public function edit(Table $table)
     {
       $branchOffices = BranchOffice::orderBy('name','ASC')->get();
       return view('parameters.tables.edit', compact('table','branchOffices'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\User  $user
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, Table $table)
     {
       $table->fill($request->all());
       $table->save();

       session()->flash('success', 'La mesa ha sido editada.');
       return redirect()->route('tables.index');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\User  $user
      * @return \Illuminate\Http\Response
      */
     public function destroy(Table $table)
     {
       $table->delete();
       session()->flash('success', 'La mesa ha sido eliminada');
       return redirect()->route('tables.index');
     }
}
