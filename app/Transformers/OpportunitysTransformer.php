<?php

namespace App\Transformers;
use App\Opportunity;
use League\Fractal\TransformerAbstract;
use Illuminate\Support\Collection;
class OpportunitysTransformer extends TransformerAbstract
{
    public function transform(Opportunity $opportunity)
    {
        return [
            'id'        => (int) $opportunity->id,
            'contact'      => $opportunity->contact,
            'sales_executive'     => $opportunity->sales_executive,
            'status'    => $opportunity->status,
            'description'    => $opportunity->description,
            'value'    => $opportunity->value,
            'meetings'    => $opportunity->meetings,
            'created_on' => date('Y-m-d',strtotime($opportunity->created_at))
        ];
    }
}

