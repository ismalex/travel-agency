@extends('layouts.app')

@section('content')

<section class="probootstrap-cover overflow-hidden relative" style="background-image: url('{{asset('img/bg_1.jpg')}}');"
    id="section-home" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md">
                <h1 class="heading mb-2 display-3 font-light probootstrap-animate fadeInUp probootstrap-animated">
                    <span style="background: color;"> Explore The World With Ease. </span></h1>
                <p class="lead mb-5  display-5 probootstrap-animate fadeInUp probootstrap-animated">
                    <span style="color: black;">
                        With DREAM-TRAVEL No more high prices for your holiday! Ever.
                    </span><a href="https://uicookies.com/license" target="_blank">Ever</a>
                    <br />
                    <span style="color: black;">Enjoy life traveling! </span>
                </p>
            </div>
        </div>
    </div>
    <div class='container-fluid'>
        <div class="col-md probootstrap-animate fadeInUp probootstrap-animated">
            {!! Form::open(['action' => 'LocationsController@store', 'method' => 'POST','class'=>'card']) !!}
            {{--  {!! Form::open(['action' => 'CountryController@index', 'method' => 'POST','class'=>'card']) !!} --}}
            <div class="card-body">
                <div class="form-group">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label>Where are you going?</label>
                            <select name="listCountries" class="form-control">
                                @foreach($countryList as $country)
                                <option value="{{ $country->id }}">{{ $country->description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            {{Form::label('title', 'Departure')}}
                            <div class="probootstrap-date-wrap">
                                <span class="icon ion-calendar"></span>
                                {{Form::text('probootstrap-date-departure', '', ['class' => 'form-control', 'placeholder' => '29/11/1990','autocomplete' => 'off', 'id' => 'probootstrap-date-departure', 'name'=>'dateDeparture', 'readonly' => 'true' ])}}
                            </div>
                        </div>
                        <div class="col-md-3">
                            {{Form::label('title', 'Arrival')}}
                            <div class="probootstrap-date-wrap">
                                <span class="icon ion-calendar"></span>
                                {{Form::text('probootstrap-date-arrival', '', ['class' => 'form-control', 'placeholder' => '29/11/1990', 'readonly' => 'true', 'autocomplete' => 'off', 'id' => 'probootstrap-date-arrival', 'name'=>'dateArrival' ])}}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label>Passengers</label>
                            <select name="numPeople" class="form-control">
                                @foreach($countryList as $people)
                                <option value="{{ $people->id }}">{{ $people->id }} Persons</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1">
                            <br />
                            {{Form::button(' Find <span class="icon ion-search"></span>', array('type' => 'submit', 'class' => 'btn btn-outline-primary','style'=>'margin-top:8px;'))}}
                        </div>
                    </div>

                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </div>

</section>
@endsection
