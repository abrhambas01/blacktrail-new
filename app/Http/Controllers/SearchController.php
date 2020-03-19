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

  public function search(Request $request)
  {
    $this->validate($request, [
      'q' => 'required'
    ]);

    $posts = Post::search( $request->get('q') )->raw();

    if(empty($posts['hits'])) {
      $posts['hits'] = [];
    }

    return response()->json(['data' => $posts['hits']]);
  }

}

}
