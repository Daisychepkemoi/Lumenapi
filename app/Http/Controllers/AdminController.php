<?php

namespace App\Http\Controllers;
use Illuminate\http\Request;
use App\User;
use Dingo\Api\Routing\Helpers;
use Response;
use Illuminate\Support\Collection;
use App\Transformers\UsersTransformer;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    use Helpers;
     public function index()
    {
        return $this->response->collection(Collection::make(User::where('role','admin')->get()), new UsersTransformer);
    }
    
    public function show($id)
    {
    
     return $this->response->collection(Collection::make(User::where('role','admin')->where('id',$id)->get()), new UsersTransformer);
    }
    public function create(Request $request)
    {
        $user = new User;
        $user->name= $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
       
        $user->save();
        return $this->response->collection(Collection::make($user), new UsersTransformer);
    }
    public function update(Request $request, $id)
    {
        $user= user::find($id);
        $user->name= $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role = $request->input('role');
       
        $user->save();
         return $this->response->collection(Collection::make($user), new UsersTransformer);
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json('user deleted successfully');
    }
   
    
}
