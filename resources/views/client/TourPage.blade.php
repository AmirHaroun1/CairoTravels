@extends('client.layout')

@section('intro')
    <section class="banner-area relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Tour Page
                    </h1>
                    <p class="text-white link-nav"><a href="{{route('home')}}">home </a>
                        <span class="lnr lnr-arrow-right"></span>  <a href="{{route('tour.show',$tour->id)}}"> Tour Page</a></p>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('content')
    <section class="insurence-one-area section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 insurence-left">
                    <img class="img-fluid img-one" src="{{$tour->getImage()}}" alt="">
                </div>
                <div class="col-lg-6 insurence-right">
                    <h6 class="text-uppercase">Tour Details</h6>
                    <h1>{{$tour->title}}</h1>
                    <p>
                        {{$tour->description}}
                    </p>
                    <div class="list-wrap">
                        <ul class="package-list">
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Destination</span>
                                <span>{{$tour->destination}}</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Booked Seats / Available Seats </span>
                                <span> {{$tour->bookedPlaces}} / {{$tour->availablePlaces}} </span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Arrival Date</span>
                                <span>{{\Carbon\Carbon::parse($tour->arrivalDate)->format('Y-M-d')}}</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Return Date</span>
                                <span>{{\Carbon\Carbon::parse($tour->returnDate)->format('Y-M-d')}}</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Pickup Location</span>
                                <span>{{$tour->pickupLocation}}</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Pickup Date</span>
                                <span>{{\Carbon\Carbon::parse($tour->pickupDate)->format('Y-M-d')}}</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Price</span>
                                <button class="primary-btn" style="color: black">{{$tour->price}}$ /individual</button>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Provider Company Name</span>
                                <span>{{$tour->company->name}}</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Provider Company Location</span>

                                <span>{{$tour->company->location}}</span>
                            </li>
                        </ul>

                            {!! Form::open(['method' => 'POST' , 'route'=>['Book.Tour',$tour->id]]) !!}
                            <select class="form-control" name="placesNumber">
                                @for($i = 0 ; $i <= $tour->availablePlaces ;$i++)

                                    <option value="{{$i}}">{{$i}}</option>

                                @endfor
                            </select>
                            <div class="text-center">

                                    <button type="submit" class="primary-btn mt-3">Book Now</button>
                            </div>

                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
