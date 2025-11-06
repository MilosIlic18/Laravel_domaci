<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository{
    private $contact;
    public function __construct(Contact $contact){

        $this->contact = $contact;
    }

    public function store($request){

        return $this->contact::create($request->all());
    }

    public function edit($request,Contact $contact){
        
        return $contact->update($request->all());
    }

    public function destroy(Contact $contact) {
        
        return $contact->delete();
    }

}