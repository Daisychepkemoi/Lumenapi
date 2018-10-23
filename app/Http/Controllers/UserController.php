<?php

namespace App\Http\Controllers;
use App\User;
use App\Contact;
use Illuminate\Http\Request;
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
    public function show($id)
    {
        $user=User::where('id',$id)->get();
         return response()->json($user);
    }
    public function showcontacts($id)
    {
        $contacts=Contact::where('user_id',$id)->get();
         return $this->response->collection(Collection::make($contacts),new ContactsTransformer);
    }
     public function showSpecificContact($id,$contactid)
    {
         return $this->response->collection(Collection::make(Contact::where('user_id',$id)->where('id',$contactid)->get()), new ContactsTransformer);
    }
    public function create(Request $request,$id)
    {
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
        return $this->response->collection(Collection::make($contact), new ContactsTransformer);
    }
    public function update(Request $request, $id)
    {
        $contact= Contact::find($id);
        $contact->name= $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->address = $request->input('address');
        $contact->company = $request->input('company');
        $contact->title = $request->input('title');
        $contact->notes = $request->input('notes');
        $contact->meetings = $request->input('meetings');
        $contact->user_id = $request->$id;
        $contact->opportunities = $request->input('opportunities');
        $contact->prefered_notification_method = $request->input('prefered_notification_method');
        $contact->save();
        return $this->response->collection(Collection::make($contact), new ContactsTransformer);
    }
    public function destroy($id,$contactid)
    {
        $contact = Contact::where('user_id',$id)->find($id);
        $contact->delete();
        
        return response()->json('Contact deleted successfully');
    }
    
   
}
