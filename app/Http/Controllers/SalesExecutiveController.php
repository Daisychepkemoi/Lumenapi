<?php

namespace App\Http\Controllers;
use App\Contact;
class SalesExecutiveController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  public function show($id)
    {
    
        return response()->json(Contact::find($id));
    }
    
}

   

