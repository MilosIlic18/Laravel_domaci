<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    function index() {
        return view("pages.contact");
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
    function getAllContacts() {
        return view("pages.allContacts",['contacts'=>Contact::all()]);
    }
}
