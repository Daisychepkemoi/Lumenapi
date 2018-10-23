<?php

namespace App\Transformers;
use App\Contact;
use League\Fractal\TransformerAbstract;
use Illuminate\Support\Collection;
class ContactsTransformer extends TransformerAbstract
{
    public function transform(Contact $contact)
    {
        return [
            'id'        => (int) $contact->id,
            'name'      => $contact->name,
            'email'     => $contact->email,
            'phone'    => $contact->phone,
            'address'    => $contact->address,
            'company'    => $contact->company,
            'title'    => $contact->title,
            'notes'    => $contact->notes,
            'meetings'    => $contact->meetings,
            'opportunities'    => $contact->opportunities,
            'notification'    => $contact->prefered_notification_method,
            'added' => date('Y-m-d',strtotime($contact->created_at))
        ];
    }
}

