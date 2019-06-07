@extends('layouts.app')

@section('content')


<section class="probootstrap_section">
 <div class="container">
 <div class="row mb-3s probootstrap-animate fadeInUp probootstrap-animated">
            <div class="col-md-12">
                <h2 class="border-bottom probootstrap-section-heading">Editing</h2>
            </div>
        </div>
            
    <div class="row text center probootstrap-animate fadeInUp probootstrap-animated">
       
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('bookings.update', $selectedBooking->id) }}">
                        {{ method_field('PUT') }}
                        {{csrf_field()}}
                        Passengers:
                        <input type="text" name="num_people" value="{{$selectedBooking->num_people}}"
                            class="form-control">
                            Location:
                        <input type="text" name="location_description" value="{{$selectedBooking->location_description}}"
                            class="form-control">
                            Departure Date:
                            <input type="text" name="departureDate" value="{{$selectedBooking->departureDate}}" class="form-control">
                            Payment Method
                        <input type="text" name="paymentMethodId" value="{{$selectedBooking->paymentMethodId}}"
                            class="form-control">
                            State
                        <input type="text" name="state" value="Pending" class="form-control">
                        Travel Info
                        <br>
                        <input type="text" name="description" value="{{$selectedBooking->description}}" class="form-control">
                        <br>
                        <input type="submit" value="save" class="btn btn-outline-primary">
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
