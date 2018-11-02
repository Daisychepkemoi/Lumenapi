<?php

namespace App\Http\Controllers;
use Illuminate\http\Request;
use App\User;
use Dingo\Api\Routing\Helpers;
use Response;
use Illuminate\Support\Collection;
use App\Transformers\UsersTransformer;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserNotification;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    use Helpers;
    public function index($id)
    {
        $this->authorize('index', User::class);
      
        return $this->response->collection(Collection::make(User::all()), new UsersTransformer);
    }
    
    public function show($id)
    {
     $this->authorize('show', User::class);
        
     return $this->response->collection(Collection::make(User::where('id',$id)->get()), new UsersTransformer);
    }
    public function create(Request $request)
    {
        $this->authorize('create', User::class);
        $user = new User;
        $user->name= $request->name;
        $user->email = $request->email;
        $user->password = app('hash')->make($request->password);
        $user->role = $request->role;
       
        $user->save();
        $email = User::where('email',$user->email)->first();
         $email->notify(new UserNotification($email));
           
         // $email->notify(new UserNotification($user));
        return response()->json($user);
    }
    public function update(Request $request, $id)
    {
        $this->authorize('update', User::class);
        $user= user::find($id);
        $user->name= $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role = $request->input('role');
       
        $user->save();
         return response()->json($user);
         // $this->response->collection(Collection::make($user), new UsersTransformer);
    }
    public function destroy($id)
    {
        $this->authorize('destroy', User::class);
        $user = User::find($id);
        $user->delete();
        return response()->json('user deleted successfully');
    }
   
    
}
