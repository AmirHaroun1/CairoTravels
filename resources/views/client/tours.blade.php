@extends('client.layout')

@section('intro')
    <section class="banner-area relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        @if($destination)
                       {{$destination}} Tours
                            @else
                            All Tours
                        @endif
                    </h1>
                    <p class="text-white link-nav"><a href="{{route('home')}}">home </a>
                        <span class="lnr lnr-arrow-right"></span>  <a href="{{route('home.tours',$destination)}}">{{$destination}} Tours</a></p>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="destinations-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-40 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Popular Destinations</h1>
                        <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, day to.</p>
                    </div>
                </div>
            </div>

            {!! Form::open(['method' => 'GET' , 'route'=>'home.search', 'class'=>'form-wrap']) !!}
            <div class="row">

                   <div class="col-md-3 text-center">
                       <label>Destination</label>

                       <select  name="destination" tabindex="0" class="form-control ">
                           <option disabled selected>--- Choose Destination ---</option>
                           <option value="sharmElSheikh">Sharm EL-Sheikh</option>
                           <option value="dahab">Dahab</option>
                           <option value="siwa">siwa</option>
                           <option value="haurghada">haurghada</option>
                           <option value="ain-sokhna">Ain-sokhna</option>
                           <option value="auxor">Auxor</option>
                           <option value="aswan">Aswan</option>
                       </select>
                   </div>
                   <div class="col-md-3 text-center">
                       <label>Arrival Date</label>
                       <input type="date" class="form-control" name="arrivalDate">

                   </div>
                   <div class="col-md-3 text-center">

                       <label>Return Date</label>
                       <input type="date" class="form-control" name="returnDate">

                   </div>
                   <div class="col-md-3 text-center">
                       <a href="#" onclick="this.closest('form').submit();return false;" style="margin-top: 30px" class="primary-btn text-uppercase">Search Tours</a>
                   </div>
            </div>

                    {!! Form::close() !!}
            <div class="row">
                    @forelse($tours as $tour)

                        @include('client._SingleTour')

                        @empty
                <div class="container mt-5">
                    <div class="row d-flex justify-content-center">
                        <div class="menu-content  col-lg-8">
                            <div class="title text-center">
                                <h1 class="mb-10">No Tours Match with search </h1>
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse


                    <div  class="m-3 text-center align-content-center">
                        {{$tours->links()}}

                    </div>
            </div>


        </div>
    </section>
@endsection
