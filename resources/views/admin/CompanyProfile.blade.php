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
                    <h3 class="text-themecolor">{{$company->name}}</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">company profile</li>
                    </ol>
                </div>

            </div>

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- Row -->
            <div class="row">

                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <center class="m-t-30">
                                <img src="{{$company->ProfilePicture()}}" class="img-circle" width="150" />
                                <h4 class="card-title m-t-10">{{$company->name}}</h4>
                                <h6 class="card-subtitle font-weight-bold">{{$company->about}}</h6>
                                <div class="row text-center justify-content-md-center">
                                    <div class="col-4">
                                        <a href="{{route('company.tours',$company->id)}}" class="font-bold">
                                            Number of Tours
                                       <i class="icon-people">

                                            </i> <font class="font-medium">{{$company->tours_count}}</font></a>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-lg-8 col-xlg-12 col-md-7">

                    <div class="card">
                        <!-- Tab panes -->
                        <div class="card-body">
                            {!! Form::open(['method' => 'PATCH' , 'route'=>['company.update',$company->id],'files'=>true]) !!}
                            @csrf
                            <div class="form-group">
                                <label class="col-md-12">Company Name</label>
                                <div class="col-md-12">
                                    <input value="{{$company->name}}" name="name" type="text" placeholder="Rahaf for tourism" class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Address</label>
                                <div class="col-md-12">
                                    <input value="{{$company->location}}" type="text" name="location" placeholder="123 Tahrir square" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Phone No</label>
                                <div class="col-md-12">
                                    <input value="{{$company->phone}}" name="phone" type="text" placeholder="123 456 7890" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Company description</label>
                                <div class="col-md-12">
                                    <textarea name="about" rows="5" class="form-control form-control-line">{{$company->about}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Company Profile Image</label>
                                <div class="col-md-12">
                                    <input name="image" type="file">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success">update Company information</button>
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
    </div>

@endsection
