@extends('admin.layout')

@section('content')
    <div class="page-wrapper">
    @include('admin._SearchBookingsPanel')

    <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">All Bookings</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('bookings.index')}}">All Bookings</a></li>
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
                            <h4 class="card-title">All Bookings</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Tour</th>
                                        <th>Destination</th>
                                        <th>Booked Places</th>
                                        <th>price</th>
                                        <th>Booked At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bookings as $booking)
                                    <tr>
                                        <td>{{$booking->user->name}}</td>
                                        <td>{{$booking->user->email}}</td>
                                        <td class="text-center">
                                            @if($booking->tour->fullyBooked)
                                                <span class="badge badge-success py-2">Fully Booked</span>
                                            @endif
                                            @if($booking->tour->BookingClosed)
                                                <span class="badge badge-warning py-2">BookingClosed</span>
                                            @endif
                                            @if($booking->tour->started)
                                                <span class="badge badge-success py-2">Started</span>
                                            @endif
                                            @if($booking->tour->active)
                                                <span class="badge badge-info py-2">active</span>
                                            @endif
                                            @if($booking->tour->returned)
                                                <span class="badge badge-dark py-2">returned</span>
                                            @endif
                                            <br>
                                            <a class="font-bold text-center" href="{{route('program.show',$booking->tour->id)}}">Tour Page</a>
                                        </td>
                                        <td>{{$booking->tour->destination}}</td>
                                        <td>{{$booking->bookedSeats}}</td>
                                        <td>{{$booking->price}}</td>
                                        <td>{{$booking->created_at}}</td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$bookings->links()}}
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
