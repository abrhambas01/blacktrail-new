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
   // return User::filter($request->all())->get();
   return view('search');
 }

 public function search()
 {
   return view('search-results');
 }

 public function searchForACriminal(Request $request)
 {

   /* $sortByValue = request()->input("sortBy");
    $countryValue = request()->input("country");
    */
    if (request()->has('sortBy') && request()->has('country'))
    {
      dd("No");
      // return response("Good",201);
    }
    else { 

      return response("Well it's bad",500);
    }

}
}


  /*Most Wanted
  if ( $sortByValue === 1 && is_null($countryValue)) { 
  }
  else { 
  }

}
}

