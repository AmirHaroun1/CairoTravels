@extends('admin.layout')

@section('content')

    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Sales Chart and browser state-->
            <!-- ============================================================== -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <h5 class="card-title">Today's Bookings</h5>
                                </div>

                            </div>
                            {!! Form::open(['method' => 'GET' , 'route'=>'bookings.search']) !!}

                            <div class="row pt-3 text-center">
                                <div style="border-right: #67757c dashed 1px" class="col-md-4">

                                    NO.Bookings
                                    <br>
                                    <h3 class="mt-3 ">

                                        <a href="#" onclick="this.closest('form').submit();return false;" class="link">
                                            {{$todayBookings->BookingsCount}}  <i class="fa fa-mouse-pointer"></i>
                                        </a>

                                        <input hidden name="BookingDate" type="date" id="TodayDate">

                                        <script type="text/javascript">
                                            document.querySelector("#TodayDate").valueAsDate = new Date();
                                        </script>
                                        {!! Form::close() !!}
                                    </h3>

                                </div>
                                <div style="border-right: #67757c dashed 1px" class="col-md-4">
                                    No.Booked Seats
                                    <br>

                                    <h3 class="mt-3">
                                        <a href="#" onclick="this.closest('form').submit();return false;" class="link">
                                        @if($todayBookings->BookedSeatsCount)

                                           {{$todayBookings->BookedSeatsCount}}
                                            @else
                                          0
                                        @endif
                                            <i class="fa fa-bookmark-o">
                                            </i>

                                        </a>
                                    </h3>

                                </div>
                                <div class="col-md-4">
                                    Total Price
                                    <br>

                                    <h3 class="mt-3">
                                        <a href="#" onclick="this.closest('form').submit();return false;" class="link">
                                            @if($todayBookings->TotalPrice)

                                                {{$todayBookings->TotalPrice}}
                                            @else
                                                0
                                            @endif
                                            <i class="fa fa-dollar">
                                            </i>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                 </div>
            </div>
                <!-- Column -->
                <!-- Column -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class=" card-title">Tours destinations</h5>
                            {!! Form::open(['method' => 'GET' , 'route'=>'program.search']) !!}
                                <button  type="submit" class="btn btn-primary">
                                    Sharm El-Sheikh <span class="badge badge-light">{{$tours->sharmCount}}</span>
                                </button>
                            <input hidden type="text" name="destination"  value="sharmElSheikh">
                            {!! Form::close() !!}
                            <br>
                            {!! Form::open(['method' => 'GET' , 'route'=>'program.search']) !!}
                                <button type="submit" class="btn btn-primary mt-2">
                                    Haurghada <span class="badge badge-light">{{$tours->haurghadaCount}}</span>
                                </button>
                                <input hidden type="text" name="destination"  value="haurghada">
                            {!! Form::close() !!}
                            <br>
                            {!! Form::open(['method' => 'GET' , 'route'=>'program.search']) !!}
                                <button type="submit" class="btn btn-primary mt-2">
                                    Dahab <span class="badge badge-light">{{$tours->dahabCount}}</span>
                                </button>
                                <input hidden type="text" name="destination"  value="dahab">
                            {!! Form::close() !!}
                            <br>
                            {!! Form::open(['method' => 'GET' , 'route'=>'program.search']) !!}
                                <button type="submit" class="btn btn-primary mt-2">
                                    Siwa <span class="badge badge-light">{{$tours->siwaCount}}</span>
                                </button>
                                <input hidden type="text" name="destination"  value="siwa">
                            {!! Form::close() !!}

                            <br>
                            {!! Form::open(['method' => 'GET' , 'route'=>'program.search']) !!}
                                <button type="submit" class="btn btn-primary mt-2">
                                    Ain-sokhna <span class="badge badge-light">{{$tours->ainSokhnaCount}}</span>
                                </button>
                                <input hidden type="text" name="destination"  value="ain-sokhna">
                            {!! Form::close() !!}
                            <br>
                            {!! Form::open(['method' => 'GET' , 'route'=>'program.search']) !!}
                                <button type="submit" class="btn btn-primary mt-2">
                                    Auxor <span class="badge badge-light">{{$tours->auxorCount}}</span>
                                </button>
                                <input hidden type="text" name="destination"  value="auxor">
                            {!! Form::close() !!}
                            <br>
                            {!! Form::open(['method' => 'GET' , 'route'=>'program.search']) !!}
                            <button type="submit" class="btn btn-primary mt-2">
                                Aswan <span class="badge badge-light">{{$tours->aswanCount}}</span>
                            </button>
                            <input hidden type="text" name="destination"  value="aswan">
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <h5 class="card-title">Tours Status</h5>
                                </div>

                            </div>
                            <div class="row pt-3 text-center">
                                <div style="border-right: #67757c dashed 1px" class="col-md-4">
                                    NO.Active tours
                                    <br>

                                    <h3 class="mt-3">
                                        {!! Form::open(['method' => 'GET' , 'route'=>'program.search']) !!}
                                            <a href="#" onclick="this.closest('form').submit();return false;" class="link">
                                                {{$tours->activeCount}}

                                                <i class="fa fa-bullseye">
                                                </i>
                                            </a>
                                            <input hidden name="TourCase" type="text" value="active">
                                        {!! Form::close() !!}
                                    </h3>
                                </div>
                                <div style="border-right: #67757c dashed 1px" class="col-md-4">
                                   NO. Bookings closed
                                        <h3 class="mt-3">
                                            {!! Form::open(['method' => 'GET' , 'route'=>'program.search']) !!}
                                            <a href="#" onclick="this.closest('form').submit();return false;" class="link">
                                                {{$tours->closedCount}}

                                                <i class="fa fa-bell-o">
                                                </i>
                                            </a>
                                            <input hidden name="TourCase" type="text" value="BookingClosed">
                                            {!! Form::close() !!}
                                        </h3>
                                </div>
                                <div class="col-md-4">
                                    NO. returned Tours
                                    <h3 class="mt-3">
                                        {!! Form::open(['method' => 'GET' , 'route'=>'program.search']) !!}
                                        <a href="#" onclick="this.closest('form').submit();return false;" class="link">
                                            {{$tours->returnedCount}}

                                            <i class="fa fa-check-circle-o">
                                            </i>
                                        </a>
                                        <input hidden name="TourCase" type="text" value="returned">
                                        {!! Form::close() !!}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
                <!-- Column -->

        </div>
                <!-- ============================================================== -->
            <!-- End Sales Chart -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer"> © 2018 Adminwrap by wrappixel.com </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
@endsection
