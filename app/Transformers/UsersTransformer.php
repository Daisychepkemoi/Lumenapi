<?php

namespace App\Transformers;
use App\User;
use League\Fractal\TransformerAbstract;
use Illuminate\Support\Collection;
class UsersTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id'        => (int) $user->id,
            'name'      => $user->name,
            'email'     => $user->email,
            'role'    => $user->role,
            'added' => date('Y-m-d',strtotime($user->created_at))
        ];
    }
}

