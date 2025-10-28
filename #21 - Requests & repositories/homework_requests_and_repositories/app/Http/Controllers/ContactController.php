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

    function store(StoreContactRequest $request) {

        $this->contactRepo->store($request);
        return redirect("/shop");
    }

    function update(EditContactRequest $request,Contact $contact) {

        $this->contactRepo->update($request,$contact);
        return redirect()->route('contact.index');
    }
    
    function destroy(Contact $contact) {
        
        $this->contactRepo->destroy($contact);
        return back();
    }
}
