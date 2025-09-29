<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    function index() {
        return view("pages.contact");
    }
    function getAllContacts() {
        return view("pages.allContacts",['contacts'=>Contact::all()]);
    }
}
