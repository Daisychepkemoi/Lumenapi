<?php

namespace App\Transformers;
use App\Meeting;
use League\Fractal\TransformerAbstract;
use Illuminate\Support\Collection;
class MeetingsTransformer extends TransformerAbstract
{
    public function transform(Meeting $meeting)
    {
        return [
            'id'        => (int) $meeting->id,
            'Location'     => $meeting->place,
            'Place'    => $meeting->Place,
            'Status'    => $meeting->status,
            'Set_On' => date('Y-m-d',strtotime($meeting->updated_at))
        ];
    }
}

