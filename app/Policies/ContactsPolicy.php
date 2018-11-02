<?php 
namespace App\Policies;
use App\User;
Use Illuminate\Auth\Access\HandlesAuthorization;
class ContactsPolicy
{
	Use HandlesAuthorization;
	public $user;
	public function __construct(User $user)
	{
		$this->user=$user;

	}
	public function create(User $user)
	{
		return $user->role == 'SE' ;
	}
	public function show(User $user)
	{
		return $user->role == 'SE' ;
	}
	public function update(User $user)
	{
		return $user->role === 'SE';
	}
	public function destroy(User $user)
	{
		return $user->role === 'SE' ;
	}
	public function index(User $user)
	{
		return $user->role == 'SE' ;
	}
	
}