<?php

namespace App\Transformers;
use App\Account;
use League\Fractal\TransformerAbstract;
use Illuminate\Support\Collection;
class AccountssTransformer extends TransformerAbstract
{
    public function transform(Account $account)
    {
        return [
            'id'        => (int) $account->id,
            'Accountname'      => $account->name,
            'Address'     => $account->email,
            'Created' => date('Y-m-d',strtotime($account->created_at))
        ];
    }
}

