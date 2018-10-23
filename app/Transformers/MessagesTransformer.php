<?php

namespace App\Transformers;
use App\Message;
use League\Fractal\TransformerAbstract;
use Illuminate\Support\Collection;
class MessagesTransformer extends TransformerAbstract
{
    public function transform(Message $message)
    {
        return [
            'id'        => (int) $message->id,
            'Type'      => $message->type,
            'subject'     => $message->subject,
            'body'    => $message->body,
            'sender'    => $message->sender,
            'recipient'    => $message->recipient,
            'added' => date('Y-m-d',strtotime($message->created_at))
        ];
    }
}

