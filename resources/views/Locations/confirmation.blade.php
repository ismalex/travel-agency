@extends('layouts.app')

@section('content')
<section class="probootstrap_section">
    <div class="container">
        <div class="row probootstrap-animate fadeInUp probootstrap-animated">
            <h2>You are traveling to {{$selectedLocation->description}}</h2>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        Booking Details

                        {!! Form::open(['action' => 'BookingsController@store', 'method' => 'POST']) !!}
                        <div class="alert alert-primary">
                            <div class="row">
                                <div class="col-md-2">
                                    Passengers
                                    <label name="people" value="2">2</label>
                                </div>
                            
                             
                                <div class="col-md-10">
                                        Travel info
                                        <br>
                                    @foreach($fligthInfo['data'] as $flight)

                                    <input type="radio" name="radio" value="{{
                                            $flight['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['departure']['iataCode'] . ' ' .
                                            $flight['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['departure']['at'].
                                             ' ' .
                                            $flight['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['arrival']['iataCode']. ' ' .
                                            $flight['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['duration']. ' '.
                                            $flight['offerItems'][0]['price']['total']
                                        }}">
                                        {{ $flight['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['departure']['iataCode'] . ' ' .
                                        $flight['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['departure']['at'].
                                         ' ' .
                                        $flight['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['arrival']['iataCode']. ' ' .
                                        $flight['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['duration']. ' '.
                                        $flight['offerItems'][0]['price']['total']
                                        }} <br>
                                    {{--  <table>
                                               <tr>
                                                <td>{{$flight['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['departure']['iataCode'] }}
                                    </td>
                                    <td>{{$flight['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['departure']['at'] }}
                                    </td>
                                    <td>{{$flight['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['arrival']['iataCode'] }}
                                    </td>
                                    <td>{{$flight['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['duration'] }}
                                    </td>
                                    <td>{{$flight['offerItems'][0]['price']['total'] }}</td>
                                    </tr>
                                    
                                    </table>--}}
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                       
                        <input type="hidden" name="num_people" value="{{$selectedLocation->id}}" />
                        <input type="hidden" name="locationid" value="{{$selectedLocation->id}}" />
                        <input type="hidden" name="location_description" value="{{$selectedLocation->description}}" /> 
                        <input type="hidden" name="paymentMethodId" value="{{$selectedLocation->id}}" />
                        <input type="hidden" name="state" value="1" />

                        <div class="col-md-3">
                            <label>Payment Method</label>
                            <select name="numpeople" class="form-control">
                                {{--  @foreach($countryList as $people)
                                        <option value="{{ $people->id }}">{{ $people->id }} Persons</option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="text-right">
                            <a href="/dream-travel/public/" class="btn btn-outline-secondary"> Cancel</a>
                            {{Form::button(' Confirm Booking ', array('type' => 'submit', 'class' => 'btn btn-outline-primary'))}}

                        </div>
                    
                    {!! Form::close() !!}
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
