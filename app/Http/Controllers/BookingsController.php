<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use Session;

class BookingsController extends Controller
{
/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('Bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $booking = new Booking;
        $booking->num_people = $request->input('num_people');
        $booking->user_id = auth()->user()->id;
        $booking->locationid = $request->input('locationid');
        $booking->location_description = $request->input('location_description');
        $booking->paymentMethodId = $request->input('paymentMethodId');
        $booking->departureDate = Session::get('date');
        $booking->state = $request->input('state'); 
        $booking->description = $request->input('radio');
        $booking->save();
        //$bookingData =$request->except('_token');
        //Booking::insert($bookingData);
         return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selectedBooking = Booking::find($id);
        return view('Bookings.edit', compact('selectedBooking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $selectedBooking = Booking::find($id);
        $selectedBooking->num_people = $request->input('num_people');
        $selectedBooking->location_description = $request->input('location_description');
        $selectedBooking->paymentMethodId = $request->input('paymentMethodId');
        $selectedBooking->state = 1; 
        $selectedBooking->departureDate = $request->input('departureDate');
        $selectedBooking->description = $request->input('description');
        $selectedBooking->save();
        //$bookingData =$request->except('_token');
        //Booking::insert($bookingData);
        return redirect('/dashboard');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $selectedBooking = Booking::find($id);
        Booking::destroy($id);
        return redirect('/dashboard');
        
    }
}
