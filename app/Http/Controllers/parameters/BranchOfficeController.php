<?php

namespace App\Http\Controllers\Parameters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BranchOffice;
use App\Company;

class BranchOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $branchOffices = BranchOffice::orderBy('id','ASC')->get();
      return view('parameters.branchoffices.index', compact('request', 'branchOffices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
       $companies = Company::orderBy('name','ASC')->get();
       return view('parameters.branchoffices.create', compact('companies'));
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         $branchOffice = new BranchOffice($request->All());
         $branchOffice->save();

         session()->flash('success', 'La sucursal ha sido creada.');
         return redirect()->route('branchoffices.index');
     }

     /**
      * Display the specified resource.
      *
      * @param  \App\User  $user
      * @return \Illuminate\Http\Response
      */
     public function show(BranchOffice $branchOffice)
     {
         //
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\User  $user
      * @return \Illuminate\Http\Response
      */
     public function edit(BranchOffice $branchoffice)
     {
       $companies = Company::orderBy('name','ASC')->get();
       return view('parameters.branchoffices.edit', compact('branchoffice','companies'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\User  $user
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, BranchOffice $branchoffice)
     {
       $branchoffice->fill($request->all());
       $branchoffice->save();

       session()->flash('success', 'La sucursal ha sido editada.');
       return redirect()->route('branchoffices.index');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\User  $user
      * @return \Illuminate\Http\Response
      */
     public function destroy(BranchOffice $branchoffice)
     {
       $branchoffice->delete();
       session()->flash('success', 'La sucursal ha sido eliminada');
       return redirect()->route('branchoffices.index');
     }
}
