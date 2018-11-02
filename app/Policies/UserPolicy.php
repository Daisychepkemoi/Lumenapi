<?php 
namespace App\Policies;
use App\User;
Use Illuminate\Auth\Access\HandlesAuthorization;
class UserPolicy
{
	Use HandlesAuthorization;
	public $user;
	public function __construct(User $user)
	{
		$this->user=$user;

	}
	public function create(User $user)
	{
		return $user->role === 'admin' ;
	}
	public function show(User $user)
	{
		return $user->role === 'admin' ;
	}
	public function index(User $user)
	{
		return $user->role === 'admin' ;
	}
	public function update(User $user)
	{
		return $user->role === 'admin' ;
	}
	public function destroy(User $user)
	{
		return $user->role === 'admin' ;
	}
	
}