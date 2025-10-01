<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    function index() {
        return view("pages.allContacts",['contacts'=>Contact::all()]);
    }
    function store(Request $request) {
        $request->validate([
            "email"     =>  "required|string|email",
            "subject"   =>  "required|string",
            "message"   =>  "required|string|min:5",
        ]);
        Contact::create($request->all());

        return redirect("/shop");
    }
    function destroy($contact_id) {
        $contact = Contact::where(["id"=>$contact_id])->first();
        if($contact == null)
            return redirect("/admin/contacts");

        $contact->delete();
        return redirect("/admin/contacts");
    }
}
