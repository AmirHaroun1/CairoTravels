@extends('client.layout')
@section('intro')
    <section class="banner-area relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Purchases
                    </h1>
                    <p class="text-white link-nav"><a href="{{route('home')}}">home </a>
                        <span class="lnr lnr-arrow-right"></span>  <a href="{{route('user.bookings')}}">My Bookings</a></p>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('content')
    <section class="insurence-one-area section-gap">
        <div class="container">
            @forelse($Bookings as $Booking)
                <div style="box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;" class="panel my-5">
                    <div class="row">
                        <div class="col-md-3">
                            <img class="img-responsive" height="310" width="280" src="{{asset('storage/'.$Booking->tour->image)}}">
                        </div>
                        <div class="col-md-2 col-sm-4 text-center">
                            <br>
                            <h3 class="primary-btn p-3">Destination : {{ $Booking->tour->destination}}</h3>
                            <br>
                            <h3 class="primary-btn p-3">Booked Seats : {{ $Booking->bookedSeats}}</h3>
                            <br>
                            <h3 class="primary-btn p-3">Total Price : {{ $Booking->price}}</h3>
                        </div>
                        <div style="margin-right: 1px" class="col-md-6 col-sm-12">
                            <div class="text-center">
                                <a class="primary-btn" href="{{route('tour.show',$Booking->tour->id)}}">
                                    {{$Booking->tour->title}}
                                </a>
                            </div>
                            <ul class="package-list">
                                <li class="d-flex justify-content-between align-items-center mt-2">

                                    <span style="font-weight: bold">Price : </span>

                                    <a  class="primary-btn">{{$Booking->tour->price}}$/individual</a>
                                </li>
                                <li class="d-flex justify-content-between align-items-center mt-2">
                                    <span style="font-weight: bold">Destination : </span>
                                    <span class="primary-btn">{{$Booking->tour->destination}}</span>
                                </li>

                                <li class="d-flex justify-content-between align-items-center mt-2">
                                    <span style="font-weight: bold">Arrival Date : </span>
                                    <span class="primary-btn">{{\Carbon\Carbon::parse($Booking->tour->arrivalDate)->format('Y-M-d')}}</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center mt-2">
                                    <span style="font-weight: bold">Return Date : </span>
                                    <span class="primary-btn">{{\Carbon\Carbon::parse($Booking->tour->returnDate)->format('Y-M-d')}}</span>
                                </li>

                                <li class="d-flex justify-content-between align-items-center mt-2">
                                    <span style="font-weight: bold">Pickup Date : </span>
                                    <span class="primary-btn">{{\Carbon\Carbon::parse($Booking->tour->pickupDate)->format('Y-M-d')}}</span>
                                </li>



                            </ul>

                        </div>
                    </div>
                </div>
                @empty
                <div class="about-content col-lg-12">
                    <h1 class="text-black">
                        No Purchases Yet
                    </h1>
                </div>
            @endforelse
        </div>
    </section>
@endsection
