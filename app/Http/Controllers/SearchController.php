<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{

  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index()
  {
   return view('search');
 }
 public function search()
 {
   return view('search-results');
 }

 public function searchForACriminal(Request $request)
 {

  $sortByValue = request("form.sortBy");
  $countryValue = request("form.countryValue");

  if ( $sortByValue === 1 && $countryValue != null ){ 
    request()->input("");
  }

}


}

