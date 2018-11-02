<?php

namespace App\Http\Controllers;
use App\Opportunity;
use App\User;
use Dingo\Api\Routing\Helpers;
use Response;
use Illuminate\Http\Request;

use Illuminate\Support\Collection;
use App\Transformers\UsersTransformer;
use App\Transformers\OpportunitysTransformer;
class SalesExecutiveOpportunityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    #working
    use Helpers;
    public function __construct()
    {
        //
    }
    public function index($id)
    {
        // $this->authorize('index', Opportunity::class);
        $name = User::where('id',$id)->where('role','SE')->pluck('name');
        $opportunities=Opportunity::where('sales_executive',$name)->get();
        
        return $this->response->collection(Collection::make($opportunities), new OpportunitysTransformer);
    }
     public function show($id,$opportunityid)
    {
        // $this->authorize('show', Opportunity::class);
        $this->authorize('index', Opportunity::class);
        
        $name = User::where('id',$id)->where('role','SE')->pluck('name');
        $opportunities=Opportunity::where('sales_executive',$name)->where('id',$opportunityid)->get();
        
        return $this->response->collection(Collection::make($opportunities), new OpportunitysTransformer);
    }
     public function create(Request $request,$id)
    {
        // $this->authorize('create', Opportunity::class);
        $name = User::where('id',$id)->where('role','SE')->pluck('name');
         $opportunities = new Opportunity;
        $opportunities->contact = $request->contact;
        $opportunities->sales_executive = $name;
        $opportunities->status = $request->status;
        $opportunities->description = $request->description;
        $opportunities->value = $request->value;
        $opportunities->meetings = $request->meetings;
        
       
        $opportunities->save();

        return response()->json($opportunities);
        // $this->response->collection(Collection::make($opportunities), new OpportunitysTransformer);
    }
    public function update(Request $request,$id,$opportunityid)
    {
        // $this->authorize('update', Opportunity::class);
        // $name = User::where('id',$id)->where('role','SE')->pluck('name');
         $opportunities = Opportunity::find($opportunityid);
        $opportunities->contact= $request->input('contact');
        // $opportunities->sales_executive = $name;
        $opportunities->status = $request->input('status');
        $opportunities->description = $request->input('description');
        $opportunities->value = $request->input('value');
        $opportunities->meetings = $request->input('meetings');
        
       
        $opportunities->save();
        $opportunity = Opportunity::where('id',$opportunityid)->get();
        return $this->response->collection(Collection::make($opportunity), new OpportunitysTransformer);
        
        
    }
    public function destroy($id,$opportunityid)
    {
         // $this->authorize('destroy', Opportunity::class);
         $name = User::where('id',$id)->where('role','SE')->pluck('name');
         $opportunity = Opportunity::where('sales_executive',$name)->find($opportunityid);
        $opportunity->delete();
        return response()->json('opportunity deleted successfully');
    }
}

   

