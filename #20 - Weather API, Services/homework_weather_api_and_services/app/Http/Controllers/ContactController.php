<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    function index() {
        return view("pages.allContacts",['contacts'=>Contact::all()]);
    }
    
    function show(Contact $contact) {
        return view("pages.editContact",["contact"=>$contact]);        
    }

    function store(Request $request) {
        $request->validate([
            "email"     =>  "required|string|email|unique:contacts",
            "subject"   =>  "required|string",
            "message"   =>  "required|string|min:5",
        ]);

        Contact::create($request->all());
        return redirect("/shop");
    }

    function update(Request $request,Contact $contact) {
        $request->validate([
            "email"     =>  "required|string|email|unique:contacts",
            "subject"   =>  "required|string",
            "message"   =>  "required|string|min:5",
        ]);

        $contact->update($request->all());
        return redirect()->route('contact.index');
    }
    
    function destroy(Contact $contact) {
        $contact->delete();
        return back();
    }
}
