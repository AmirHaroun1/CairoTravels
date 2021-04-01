@extends('admin.layout')


@section('content')

    <div class="page-wrapper">

    @if(session('CompanyTours'))

        @else
        @include('admin._SearchtourPanel')
    @endif
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">All Programs</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('program.index')}}">All Tour Programs</a></li>
                    </ol>
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">All Tours</h4>
                            <h6 class="card-subtitle">
                                <span class="badge badge-success py-2">started</span> means Tour is on its Journey
                                <span class="badge badge-info py-2">active</span> means Tour has not started yet and available for users
                                <span class="badge badge-success py-2">Fully Booked</span>Tour is fully booked
<br>
                                <span class="badge badge-warning mt-2 py-2">BookingClosed</span> current date passed the (last Booking deadline date) and waiting for the pickup date
                                <span class="badge badge-dark mt-2 py-2">Returned</span> The Tour Has Returned
                            </h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Tour Page</th>
                                        <th>destination</th>
                                        @if(session('CompanyTours'))
                                            @else
                                        <th>Company Name</th>
                                        @endif
                                        <th>Hotel</th>
                                        <th>Arrival / Return</th>
                                        <th>Booked / Available</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tours as $tour)
                                    <tr>
                                        <td class="text-center">
                                            @if($tour->fullyBooked)
                                                <span class="badge badge-success py-2">Fully Booked</span>
                                            @endif
                                            @if($tour->BookingClosed)
                                                    <span class="badge badge-warning py-2">BookingClosed</span>
                                            @endif
                                            @if($tour->started)
                                                    <span class="badge badge-success py-2">Started</span>
                                            @endif
                                            @if($tour->active)
                                                    <span class="badge badge-info py-2">active</span>
                                            @endif
                                            @if($tour->returned)
                                                    <span class="badge badge-dark py-2">returned</span>
                                            @endif
                                                <br>
                                            <a class="font-bold text-center" href="{{route('program.show',$tour->id)}}">Tour Page</a>
                                        </td>
                                        <td>{{$tour->destination}}</td>
                                        @if(session('CompanyTours'))

                                            @else
                                        <td><a href="{{route('company.show',$tour->company->id)}}">{{$tour->company->name}}</a></td>
                                        @endif
                                        <td>{{$tour->hotel}}</td>
                                        <td>{{Carbon\Carbon::parse($tour->arrivalDate)->format('d-M-Y H:i A')}}
                                            /
                                            <br>
                                            {{Carbon\Carbon::parse($tour->returnDate)->format('d-M-Y H:i A')}}
                                        </td>
                                        <td>{{$tour->bookedPlaces}} / {{$tour->availablePlaces}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$tours->links()}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2018 Adminwrap by wrappixel.com
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>


@endsection
