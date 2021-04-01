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
                    <h3 class="text-themecolor">Add Tour Company</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Add New Tour Company</li>
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
                            {!! Form::open(['method' => 'POST' , 'route'=>'company.store','files'=>true]) !!}
                            @csrf
                             <div class="form-group">
                                    <label class="col-md-12">Company Name</label>
                                    <div class="col-md-12">
                                        <input name="name" type="text" placeholder="Rahaf for tourism" class="form-control form-control-line">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Address</label>
                                    <div class="col-md-12">
                                        <input type="text" name="location" placeholder="123 Tahrir square" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input name="phone" type="text" placeholder="123 456 7890" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Company description</label>
                                    <div class="col-md-12">
                                        <textarea name="about" rows="5" class="form-control form-control-line"></textarea>
                                    </div>
                                </div>
                            <div class="form-group">
                                <label class="col-md-12">Company Profile Image</label>
                                <div class="col-md-12">
                                    <input required name="image" type="file">
                                </div>
                            </div>

                            <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Add Company</button>
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
