<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Contact;
use Dingo\Api\Routing\Helpers;
use Response;
use Illuminate\Support\Collection;
use App\Transformers\UsersTransformer;
use App\Transformers\ContactsTransformer;
class UserController extends Controller
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
    // public function show($id)
    // {
    //     $this->authorize('create', User::class);
    //     $user=User::where('id',$id)->get();
    //      return response()->json($user);
    // }
    public function index($id)
    {
        $this->authorize('create', Contact::class);
        $contacts=Contact::where('user_id',$id)->get();
         return $this->response->collection(Collection::make($contacts),new ContactsTransformer);
    }
     public function show($id,$contactid)
    {
        $this->authorize('show', User::class);
         return $this->response->collection(Collection::make(Contact::where('user_id',$id)->where('id',$contactid)->get()), new ContactsTransformer);
    }
    public function create(Request $request,$id)
    {
        $this->authorize('create', Contact::class);
        $contact = new Contact;
        $contact->name= $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->company = $request->company;
        $contact->title = $request->title;
        $contact->notes = $request->notes;
        $contact->meetings = $request->meetings;
        $contact->user_id = $request->$id;
        $contact->opportunities = $request->opportunities;
        $contact->prefered_notification_method = $request->prefered_notification_method;
       
       
        $contact->save();
        $transformedcontact = Contact::where('email',$contact->email)->get();

        return response()->json($transformedcontact);
    }
    public function update(Request $request, $id,$contactid)
    {
        $this->authorize('update', Contact::class);
        $contact= Contact::find($contactid);
        $contact->name= $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->address = $request->input('address');
        $contact->company = $request->input('company');
        $contact->title = $request->input('title');
        $contact->notes = $request->input('notes');
        $contact->meetings = $request->input('meetings');
        
        $contact->opportunities = $request->input('opportunities');
        $contact->prefered_notification_method = $request->input('prefered_notification_method');
        $contact->save();
        $transformedcontact = Contact::where('id',$contactid)->get();
        return $this->response->collection(Collection::make($transformedcontact), new ContactsTransformer);
    }
    public function destroy($id,$contactid)
    {
        $this->authorize('destroy', Contact::class);
        $contact = Contact::where('user_id',$id)->find($id);
        $contact->delete();
        
        return response()->json('Contact deleted successfully');
    }
    
   
}
