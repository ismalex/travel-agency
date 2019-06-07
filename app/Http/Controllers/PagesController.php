<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class PagesController extends Controller
{
    public function index(){
        $countryList = Country::all();
        return view('pages.index')->with('countryList',$countryList);
    }

     public function about(){
         return view('pages.about');
     }

     public function services(){
         return view('pages.services');
     }
     
    
}
