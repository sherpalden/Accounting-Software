<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
	// view index page
    public function index(){
    	return view('user.index');
    }

    // view products page
    public function ProductView(){
    	return view('user.products');
    }

    // view contact page
    public function ContactView(){
    	return view('user.contact');
    }

    // view about page
    public function AboutView(){
        return view('user.about');
    }


}
