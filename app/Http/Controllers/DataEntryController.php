<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class DataEntryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
        //
    }
   
    public function index($id)
    {
    
        return response()->json(Contact::where('user_id',$id)->get());
    }
    public function show($id, $contactid)
    {
    
        return response()->json(Contact::where('user_id',$id)->find($contactid));
    }
    
}
