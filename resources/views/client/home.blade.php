@extends('client.layout')
@section('intro')
    <section class="banner-area relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-between">
                <div class="col-lg-6 col-md-6 banner-left">
                    <h1 class="text-white">Magical Cairo Tours</h1>
                    <p class="text-white">
                        If you are looking for best Tours Booking websites, you are in the right place.Check our Top Destinations.
                    </p>
                    <a href="{{route('home.tours','sharmElSheikh')}}" class="primary-btn text-uppercase">Sharm El-sheikh ( {{$destinations->sharmCount}} )</a>
                    <a href="{{route('home.tours','haurghada')}}" class="primary-btn text-uppercase mt-3">Hurghada ( {{$destinations->haurghadaCount}} )</a>
                    <a href="{{route('home.tours','ain-sokhna')}}" class="primary-btn text-uppercase mt-3">Galala Ain-Sokhna ( {{$destinations->ainSokhnaCount}} )</a>

                    <a href="{{route('home.tours','dahab')}}" class="primary-btn text-uppercase mt-3">Dahab ( {{$destinations->dahabCount}} )</a>
                    <a href="{{route('home.tours','siwa')}}" class="primary-btn text-uppercase mt-3">Siwa ( {{$destinations->siwaCount}} )</a>
                    <a href="{{route('home.tours','aswan')}}" class="primary-btn text-uppercase mt-3">Aswan ( {{$destinations->aswanCount}} )</a>
                    <a href="{{route('home.tours','auxor')}}" class="primary-btn text-uppercase mt-3">Luxor ( {{$destinations->auxorCount}} )</a>
                </div>
                @include('client._SearchToursPanel')
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
            <div class="row">

                <div class="col-lg-4">
                    <a href="{{route('home.tours','sharmElSheikh')}}">
                        <div class="single-destinations">
                            <div class="thumb">
                                <img height="236" width="350"   src="{{asset('img/sharmDestination.jpg')}}" alt="">
                            </div>
                            <div class="details">
                                <h4 class="d-flex justify-content-between">
                                    <span class="link">Sharm El-Sheikh</span>
                                    <div class="star">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="{{route('home.tours','haurghada')}}">
                        <div class="single-destinations">
                            <div class="thumb">
                                <img height="236" width="350"  src="{{asset('img/hurghadaDestination.jpg')}}" alt="">
                            </div>
                            <div class="details">
                                <h4 class="d-flex justify-content-between">
                                    <span class="link">Hurghada</span>
                                    <div class="star">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="{{route('home.tours','aswan')}}">
                        <div class="single-destinations">
                            <div class="thumb">
                                <img height="236" width="350"  src="{{asset('img/aswanDestination.jpg')}}" alt="">
                            </div>
                            <div class="details">
                                <h4 class="d-flex justify-content-between">
                                    <span class="link">Aswan</span>
                                    <div class="star">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4">
                    <a href="{{route('home.tours','dahab')}}">
                        <div class="single-destinations">
                            <div class="thumb">
                                <img height="236" width="350"  src="{{asset('img/dahabDestination.jpg')}}" alt="">
                            </div>
                            <div class="details">
                                <h4 class="d-flex justify-content-between">
                                    <span class="link">Dahab</span>
                                    <div class="star">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4">
                    <a href="{{route('home.tours','ain-sokhna')}}">
                        <div class="single-destinations">
                            <div class="thumb">
                                <img src="{{asset('img/ain-sokhnaDestination.jpg')}}" alt="">
                            </div>
                            <div class="details">
                                <h4 class="d-flex justify-content-between">
                                    <span class="link">Galala Ain-sokhna </span>
                                    <div class="star">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="{{route('home.tours','siwa')}}">
                        <div class="single-destinations">
                            <div class="thumb">
                                <img src="{{asset('img/siwaDestination.jpg')}}" alt="">
                            </div>
                            <div class="details">
                                <h4 class="d-flex justify-content-between">
                                    <span class="link">Siwa</span>
                                    <div class="star">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4">
                    <a href="{{route('home.tours','auxor')}}">
                        <div class="single-destinations">
                            <div class="thumb">
                                <img height="236" width="350"  src="{{asset('img/luxorDestination.jpg')}}" alt="">
                            </div>
                            <div class="details">
                                <h4 class="d-flex justify-content-between">
                                    <span class="link">Luxor</span>
                                    <div class="star">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>








    <section class="home-about-area">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-end">
                <div class="col-lg-6 col-md-12 home-about-left">
                    <h1>
                        Did not find your Destination? <br>
                        Check All our tours. <br>
                    </h1>
                    <p>
                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat                     </p>
                    <a href="{{route('home.tours')}}" class="primary-btn text-uppercase">See All Tours</a>
                </div>
                <div class="col-lg-6 col-md-12 home-about-right no-padding">
                    <img class="img-fluid" src="{{asset('img/about-img.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </section>
@endsection
