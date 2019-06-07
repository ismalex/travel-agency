<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Country;
use Session;
use GuzzleHttp\Client;


class LocationsController extends Controller
{

/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Request data from the amadeus API.
     * Generating the authorization token in every API call.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

         $idselectedlocation = $request->input('listCountries');
         $countrylocations = Location::with('Features')->where('country_id','=', $idselectedlocation)->get();
         $selectedCountryiata = Country::where('id','=', $idselectedlocation)->get();
         $dateDeparture  = \Carbon\Carbon::parse($request->input('dateDeparture'))->format('Y-m-d');
         Session::put('date', $dateDeparture);

            //get the new token everytime we call the AMADEUSAPI
            $client = new Client();
            $autorization = $client->post('https://test.api.amadeus.com/v1/security/oauth2/token', [
                'headers' => ['Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'form_params'=>[
                'grant_type'=> 'client_credentials',
                'client_id'=>'xvofRYMsIcJT50ex8rnEWu0vffYtKfGU',
                'client_secret'=>'GkEFTwSeq4arNRjJ',
                ], 
            ]);
        $autorization = json_decode($autorization->getBody(),true);
        $clientAPI = new Client([
            'headers' => ['Authorization' => $autorization["token_type"].' '.$autorization["access_token"]],
            'base_uri' => 'https://test.api.amadeus.com/v1/shopping/flight-offers?origin=LHR&destination=MAD&departureDate='.$dateDeparture.'&max=2',
        ]);
        $response = $clientAPI->request('GET', '');
        $flightInfo= json_decode($response->getBody(), true);
       
        $datas = $flightInfo['data'];

        $a = null;
        foreach($datas as $data)
        {
           $a= $data['offerItems'][0];
        }
        $a;
      
        return view('Locations.index')->with('countrylocations', $countrylocations)->with('flightInfo',$a)->with('iata_description',$selectedCountryiata)->with('numPeople',$idselectedlocation);

    }
    catch (Exception $e) {
        return $e;
    }
    
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $selectedLocation = Location::find($id);
        $client = new Client();
        $autorization = $client->post('https://test.api.amadeus.com/v1/security/oauth2/token', [
            'headers' => ['Content-Type' => 'application/x-www-form-urlencoded',
        ],
        'form_params'=>[
            'grant_type'=> 'client_credentials',
            'client_id'=>'xvofRYMsIcJT50ex8rnEWu0vffYtKfGU',
            'client_secret'=>'GkEFTwSeq4arNRjJ',
            ], 
        ]);
        $autorization = json_decode($autorization->getBody(),true);
        $client1 = new Client([
            'headers' => ['Authorization' => $autorization["token_type"].' '.$autorization["access_token"]],
            'base_uri' => 'https://test.api.amadeus.com/v1/shopping/flight-offers?origin=LHR&destination=MAD&departureDate=2019-08-01&max=2',
        ]);
        $response = $client1->request('GET', '');
        $fligthInfo= json_decode($response->getBody(), true);
       // return $selectedLocation;
        return view('locations.confirmation')->with('selectedLocation',$selectedLocation)->with('fligthInfo',$fligthInfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
    }
}
