@extends('layouts.app')

@section('content')
<section class="probootstrap_section">
    <div class="container">
        <div class="row mb-3s probootstrap-animate fadeInUp probootstrap-animated">
            <div class="col-md-12">
                <h2 class="border-bottom probootstrap-section-heading">Welcome</h2>
            </div>
        </div>

        <div class="row probootstrap-animate fadeInUp probootstrap-animated">
            <div class="col-md-12">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <h3>My Bookings</h3>
                            <table class="table table-striped">
                                <tr>

                                    <th>Passengers</th>
                                    <th>Location</th>
                                    <th>Departure</th>
                                    <th>Created</th>
                                    <th>Payemt Method</th>
                                    <th>Description</th>
                                    <th>State</th>
                                 
                                    <th style="width:150px;"></th>
                                
                                </tr>
                                @forelse($userBookings as $booking)
                                <tr>
                                    <td> {{$booking->num_people}}</td>
                                    <td> {{$booking->location_description}}</td>
                                    <td> {{$booking->departureDate}}</td>
                                    <td> {{$booking->created_at}}</td>
                                    <td> {{$booking->paymentMethodId}}</td>
                                    <td> {{$booking->description}}</td>
                                    <td> Pending</td>
                                    <td>
                                        {!! Form::open(['action' => ['BookingsController@destroy',$booking->id],
                                        'method' => 'POST',]) !!}
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <a href="{{ route ('bookings.edit', $booking->id)}}"
                                            class="btn btn-sm btn-outline-primary">Edit</a>
                                        {{Form::button(' Delete', array('type' => 'submit', 'class' => 'btn btn-sm  btn-outline-danger'))}}

                                        {!! Form::close() !!}

                                </tr>
                                @empty
                                <tr>
                                    <td>No data found</td>
                                </tr>
                                @endforelse
                            </table>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
