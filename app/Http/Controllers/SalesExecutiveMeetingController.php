<?php

namespace App\Http\Controllers;
use App\Meeting;
use App\User;
use App\Opportunity;
use Dingo\Api\Routing\Helpers;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
// use App\Transformers\UsersTransformer;
use App\Transformers\MeetingsTransformer;
class SalesExecutiveMeetingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    use Helpers;
    public function __construct()
    {
       
        //
    }
    public function index($id)
    {
            
        // $this->authorize('index', Opportunity::class);
       $name=User::where('id',$id)->where('role','SE')->pluck('name');
        $opportunityid=Opportunity::where('sales_executive',$name)->pluck('id');
        $meetings = Meeting::whereIn('opportunity_id',$opportunityid)->get();
        return $this->response->collection(Collection::make($meetings), new MeetingsTransformer);
    }
     public function show($id,$idmeeting)
    {
       // $this->authorize('show', Opportunity::class);
       $name=User::where('id',$id)->where('role','SE')->pluck('name');
        $opportunityid=Opportunity::where('sales_executive',$name)->pluck('id');
        $meetings = Meeting::whereIn('opportunity_id',$opportunityid)->where('id',$idmeeting)->get();
        return $this->response->collection(Collection::make($meetings), new MeetingsTransformer);
    }
     public function create(Request $request,$id)
    {
        //parameter error.
        // $this->authorize('create', Opportunity::class)
        $meeting = new Meeting;
        $meeting->opportunity_id= $request->opportunity_id;
        $meeting->place = $request->place;
        $meeting->status = $request->status;
        $meeting->location = $request->location;
        $meeting->save();
        return response()->json('saves');
        // return $this->response->collection(Collection::make($meetings), new MeetingsTransformer);
    }
    public function update(Request $request,$id,$idmeeting)
    {

       
        $meeting= Meeting::find($idmeeting);
        $meeting->place = $request->input('place');
        $meeting->status = $request->input('status');
        $meeting->location = $request->input('location');
        $meeting->save();
       return response()->json($meeting);
       // $this->response->collection(Collection::make($meetings), new MeetingsTransformer);
        
        
    }
    public function destroy($id,$idmeeting)
    {
         $name=User::where('id',$id)->where('role','SE')->pluck('name');
        $opportunityid=Opportunity::where('sales_executive',$name)->pluck('id');
         $meeting = Meeting::where('opportunity_id',$opportinityid)->find($idmeeting);
        $meeting->delete();
        return response()->json('meeting deleted successfully');
    }

}
