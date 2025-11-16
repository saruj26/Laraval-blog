<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function contactForm(){
        return view('contact.form');
    }

    public function submitContactForm(Request $request){
        $validatedData = $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255',
            'message'=>'required|string',
        ]);
        $data=$request->all();
        return redirect()->back()->with('success', 'Thank you for contacting us!');
    }

}