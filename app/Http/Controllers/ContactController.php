<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function create()
    {
        return Inertia::render('Contact');
    }
    public function store(Request $request){
        $request->validate([
            'email'=>'required|email',
            'message'=>'required',
            'subject'=>'required'
        ]);
        $contact = Contact::create($request->all());
        foreach (['yassine.elmalki@gmail.com'] as $recipient) {
            \Illuminate\Support\Facades\Mail::to($recipient)->send(new \App\Mail\NewContactMail($contact));
        }
    }
}
