@extends('layouts.app')

@section('content')

<section class="probootstrap_section">
    <div class="container">
        <div class="row mb-3 probootstrap-animate fadeInUp probootstrap-animated">
            <div class="col-md-12 border-bottom ">
                <h3 class=" probootstrap-section-heading">Search Results</h3>
            </div>
        </div>
        <div class="row probootstrap-animate fadeInUp probootstrap-animated">
            @if(count($countrylocations) > 0 )
            @foreach($countrylocations as $location)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src={{$location->image}} alt="Place Image" height="250" width="350">
                            </div>
                            <div class="col-md-8">
                                <h3><span style="background: black; color:white;"> {{$location->description}}  </span>
                                </h3>
                                <br>
                                <div class="two-columns">
                                {{$location->iata_description}}
                                @forelse ($location->Features as $feat)
                                
                                    <h5> • {{$feat->description}}</h5>
                                
                                @empty
                                <p> No data Found.</p>
                                @endforelse
                            </div>
                               
                                <div class="alert border-primary">
                                    Includes:
                                    <div class="row text-center">
                                        @forelse ($flightInfo['price'] as $flight)
                                        
                                        @empty
                                        <p> No data Found.</p>
                                        @endforelse
                                        <div class="col-md-3">
                                            <ion-icon style="font-size:60px;" name="airplane"></ion-icon>
                                           <h5> <span class="badge badge-secondary">
                                           LHR - @forelse ($iata_description as $flightDesc)
                                           {{$flightDesc->iata_description}}
                                           @empty  
                                           @endforelse
                                          </h5>
                                            </span>
                                            {{-- <br />
                                                    {{$location->created_at}} - {{$location->created_at}} --}}
                                        </div>
                                        <div class="col-md-3">
                                            <ion-icon style="font-size:60px;" name="bus"></ion-icon>
                                          <h5> <span class="badge badge-secondary">A-75</span>  </h5>
                                        </div>
                                        <div class="col-md-3">
                                            <ion-icon style="font-size:60px;" name="bed"></ion-icon>
                                            <h5><span class="badge badge-secondary">{{$numPeople}}</span>  </h5>
                                        </div>
                                        <div class="col-md-3">
                                         <b>TOTAL
                                         <h5>{{$flight}}</h5>
                                        </b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-outline-secondary">
                                <span class="icon ion-heart"></span> Like
                            </button>
                            <a href="/dream-travel/public/locations/{{$location->id}}" class="btn btn-outline-primary">Details</a>
                        </div>
                    </div>
                </div>
                <br>
            </div>
            @endforeach
            @else
            <p>No data Found</p>
            @endif
        </div>
    </div>
</section>

@endsection
