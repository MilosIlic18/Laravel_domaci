<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Repositories\ContactRepository;
use App\Http\Requests\EditContactRequest;
use App\Http\Requests\StoreContactRequest;

class ContactController extends Controller
{
    //
    private $contactRepo;
    public function __construct(ContactRepository $contactRepo){

        $this->contactRepo = $contactRepo;
    }

    function index() {        
        return view("pages.allContacts",['contacts'=>Contact::all()]);
    }
    
    function show(Contact $contact) {

        return view("pages.editContact",["contact"=>$contact]);        
    }

    function store(StoreContactRequest $storeContactRequest) {

        $this->contactRepo->store($storeContactRequest);
        return redirect("/shop");
    }

    function update(EditContactRequest $editContactRequest,Contact $contact) {

        $this->contactRepo->edit($editContactRequest,$contact);
        return redirect()->route('contact.index');
    }
    
    function destroy(Contact $contact) {
        
        $this->contactRepo->destroy($contact);
        return back();
    }
}
