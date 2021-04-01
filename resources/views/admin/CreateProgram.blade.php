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
                    <h3 class="text-themecolor">Add Tour Program</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Add New Tour Program</li>
                    </ol>
                </div>

            </div>

            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- Row -->
            <div class="row">

                <!-- Column -->
                <div class="col-lg-12 col-xlg-12 col-md-7">

                    <div class="card">
                        <!-- Tab panes -->
                        <div class="card-body">
                            {!! Form::open(['method' => 'POST' , 'route'=>'program.store','files'=>true]) !!}
                            @csrf
                            <div class="form-group">
                                <label class="col-md-12">Tour Company</label>
                                <div class="col-md-12">
                                    <select class="selectpicker" data-live-search="true" name="company_id">
                                        @foreach($companies as $company)

                                            <option value="{{$company->id}}">{{$company->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Tour title</label>
                                <div class="col-md-12">
                                    <input name="title" type="text" placeholder="Sharm elshikh best price program" class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">destination</label>
                                <div class="col-md-12">
                                    <select name="destination" class="form-control" >
                                        <option value="sharmElSheikh">Sharm EL-Sheikh</option>
                                        <option value="dahab">Dahab</option>
                                        <option value="siwa">siwa</option>
                                        <option value="haurghada">haurghada</option>
                                        <option value="ain-sokhna">Ain-sokhna</option>
                                        <option value="auxor">Auxor</option>
                                        <option value="aswan">Aswan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 mt-3">
                                            <label>Arrival Date </label>
                                            <input class="form-control" name="arrivalDate" type="datetime-local">
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label>Return Date </label>
                                            <input class="form-control" name="returnDate" type="datetime-local">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Hotel</label>
                                <div class="col-md-12">
                                    <input name="hotel" type="text" placeholder="Hilton Hotel" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Program description <p class="small">Activities - Places</p> </label>
                                <div class="col-md-12">
                                    <textarea name="description" rows="5" class="form-control form-control-line"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Pickup Location<p class="small">Tahrir-square</p> </label>

                                            <input name="pickupLocation" type="search" id="pickuplocation" placeholder="tahrir-square" />
                                            <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
                                            <script>
                                                var placesAutocomplete = places({
                                                    container: document.querySelector('#pickuplocation')
                                                }).configure({
                                                    type: ['Address','city'],
                                                    countries: ['eg']
                                                });

                                            </script>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label>Pickup Date </label>
                                            <input class="form-control" name="pickupDate" type="datetime-local">
                                        </div>
                                    </div>

                                </div>
                            </div>
                                <div class="form-group mt-4">
                                        <div class="col-md-12">
                                            <label>Available Place </label>

                                            <input class="form-control" name="availablePlaces" type="number" id="availablePlaces" placeholder="100" />

                                        </div>

                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Image describe your program</label>
                                <div class="col-md-12">
                                    <input required name="image" type="file">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Add Tour</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <!-- Column -->

            </div>
            <!-- Row -->
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

@endsection
