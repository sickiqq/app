<?php

namespace App\Http\Controllers\parameters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $companies = Company::orderBy('name','ASC')->get();
      return view("parameters.companies.index",compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
       return view('parameters.companies.create');
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         $company = new Company($request->All());
         $company->save();

         session()->flash('success', 'La Empresa ha sido creada.');
         return redirect()->route('companies.index');
     }

     /**
      * Display the specified resource.
      *
      * @param  \App\User  $user
      * @return \Illuminate\Http\Response
      */
     public function show(Category $category)
     {
         //
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\User  $user
      * @return \Illuminate\Http\Response
      */
     public function edit(Company $company)
     {
       return view('parameters.companies.edit', compact('company'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\User  $user
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, Company $company)
     {
       $company->fill($request->all());
       $company->save();

       session()->flash('success', 'La Empresa ha sido editada.');
       return redirect()->route('companies.index');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\User  $user
      * @return \Illuminate\Http\Response
      */
     public function destroy(Company $company)
     {
       $company->delete();
       session()->flash('success', 'La Empresa ha sido eliminada');
       return redirect()->route('companies.index');
     }
}
