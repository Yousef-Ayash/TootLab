<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    // GET /doctor/contact
    public function index()
    {
        // You could load this from a config or DB
        // $social = [
        //     'facebook'  => 'https://facebook.com/yourlab',
        //     'instagram' => 'https://instagram.com/yourlab',
        //     'website'   => 'https://yourlab.example.com',
        // ];

        // return view('doctor.contact', compact('social'));
        return view('doctor.contact');
    }
}
