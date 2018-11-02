<?php

namespace App\Http\Controllers;

use App\Meeting;
use App\User;
use App\Opportunity;
use Dingo\Api\Routing\Helpers;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
// use Illuminate\Http\Request;

use App\Transformers\UsersTransformer;
use App\Transformers\MeetingsTransformer;

class SalesExecutiveMeetingsOppoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    use Helpers;
    public function __construct()
    {
       
        
    }
     public function index($id,$opportunityid)
    {
        
       $name=User::where('id',$id)->whedre('role','SE')->pluck('name');
        $opportunityids=Opportunity::where('sales_executive',$name)->pluck('id');
        $meetings= Meeting::whereIn('opportunity_id',$opportunityids)->get();
        return $this->response->collection(Collection::make($meetings), new MeetingsTransformer);
    
        
    }
    public function show($id,$opportunityid,$idmeeting)
    {
        $name=User::where('id',$id)->where('role','SE')->pluck('name');
        $opportunityids=Opportunity::where('sales_executive',$name)->pluck('id');
        $meeting= Meeting::whereIn('opportunity_id',$opportunityids)->where('id',$idmeeting)->get();
         return  $this->response->collection(Collection::make($meeting), new MeetingsTransformer);
    
    }

     public function create(Request $request,$id,$opportunityid)
    
    {
       
         $meeting= new Meeting;
        $meeting->place = $request->place;
        $meeting->status = $request->status;
        $meeting->location = $request->location;
        $meeting->opportunity_id = $opportunityid;
        $meeting->save();
        return response()->json($meeting);
         // $this->response->collection(Collection::make($meeting), new MeetingsTransformer);
    
    }
    public function update(Request $request,$opportunityid,$idmeeting)
    {
        
        $meeting= Meeting::find($idmeeting);
        $meeting->place = $request->input('place');
        $meeting->status = $request->input('status');
        $meeting->location = $request->input('location');
        $meeting->save();

        return response()->json($meeting);
        
        
    }
    public function destroy($id,$opportunityid)
    {
         $name=User::where('id',$id)->where('role','SE')->pluck('name');
         $meeting = Meeting::where('sales_executive',$name)->where('opportunity_id',$opportunityid)->get();
        $meeting->delete();
        return response()->json('meeting deleted successfully');
    }
     
}
