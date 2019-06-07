@extends('layouts.app')

@section('content')
<h1>My Bookings</h1>
<div class="row">
    <div class="col-md-8">
        <div class="card">

            <div class="cardbody">
                <table class="table">
                    <tr>
                        <th>Description</th>
                        <th>Passengers</th>
                        <th>Location</th>
                        <th>Payemt Method</th>
                        <th>State</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                    @forelse($bookings as $booking)
                    <tr>
                        <td> {{$booking->description}}</td>
                        <td> {{$booking->description}}</td>
                        <td> {{$booking->description}}</td>
                        <td> {{$booking->description}}</td>
                        <td> {{$booking->description}}</td>
                        <td> {{$booking->description}}</td>
                        <td> {{$booking->description}}</td>
                        <td> {{$booking->description}}</td>
                        <td>
                            {!! Form::open(['action' => ['BookingsController@destroy',$booking->id], 'method' =>
                            'POST','class'=>'card']) !!}
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            {{Form::button(' Find <span class="icon ion-search"></span>', array('type' => 'submit', 'class' => 'btn btn-primary','style'=>'margin-top:8px;'))}}
                            {!! Form::close() !!}
                            <a href="{{ route ('bookings.edit', $booking->id)}}" class="btn btn-outline-primary">Edit1</a>
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
@endsection
