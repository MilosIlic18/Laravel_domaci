<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    function index() {
        return view("pages.allContacts",['contacts'=>Contact::all()]);
    }
    
    function show($contact_id) {
        $contact = Contact::find(["id"=>$contact_id])->first();
        if($contact === null)
            return redirect()->route('contact.index');;
        return view("pages.editContact",["contact"=>$contact]);        
    }
    
    function update(Request $request) {
        $request->validate([
            "email"     =>  "required|string|email",
            "subject"   =>  "required|string",
            "message"   =>  "required|string|min:5",
        ]);

        $contact = Contact::find(["id"=>$request->id])->first();
        if($contact === null)
            return redirect()->route('contact.index');
    
        $contact->update($request->all());
        return redirect()->route('contact.index');
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
    
    function destroy($contact_id) {
        $contact = Contact::where(["id"=>$contact_id])->first();
        if($contact === null)
            return back();

        $contact->delete();
        return back();
    }
}
