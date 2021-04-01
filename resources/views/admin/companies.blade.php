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
                    <h3 class="text-themecolor"><a href="{{route('companies.index')}}">All Tour Companies</a></h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('companies.index')}}">companies</a></li>
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
                            <div class="row justify-content-between">
                                <div class="col-md-3">
                                    <h4 class="card-title">Registered Companies</h4>
                                </div>

                                <div  class="col-md-5">
                                    <form class="form-inline md-form form-sm mt-0">

                                        <input id="namesearch" name="CompanyName"
                                               class="form-control form-control-sm ml-3 w-75 border-right-0 border-left-0 border-top-0" type="text" placeholder="Search" aria-label="Search">
                                    <h3 class="ml-2">
                                      <a onclick="this.closest('form').submit();return false;" id="search" href="javascript:void(0)"> <i class="fa fa-search" aria-hidden="true"></i></a>
                                    </h3>
                                    </form>


                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                          <th>
                                              Verified
                                            <a href="{{route('companies.index',['orderByCase'=>'FilterVerified','companyName'=>$CompanyName])}}">
                                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                                            </a>
                                          </th>
                                        <th>
                                            Name
                                            <a href="{{route('companies.index',['orderByCase'=>'FilterName','companyName'=>$CompanyName])}}">
                                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                                            </a>
                                        </th>
                                        <th>
                                            Address
                                            <a href="{{route('companies.index',['orderByCase'=>'FilterAddress','companyName'=>$CompanyName])}}">
                                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                                            </a>
                                        </th>
                                        <th>
                                            Offered tours
                                            <a href="{{route('companies.index',['orderByCase'=>'FilterOfferedTours','companyName'=> $CompanyName])}}">
                                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                                            </a>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($companies as $company)
                                        <tr>
                                            <td>
                                                @if($company->verified)
                                                <span class="fa-stack fa-lg">
                                                  <i style="color:#20aee3" class="fa fa-shield "></i>
                                                  <i style="color:#20aee3" class="fa fa-check fa-stack-1x"></i>
                                                </span>
                                                    @endif
                                            </td>
                                            <td>
                                                <a class="font-20 font-weight-bold" href="{{route('company.show',$company->id)}}">
                                             {{$company->name}}
                                                </a>
                                            </td>
                                            <td>{{$company->location}}</td>
                                            <td><a href="{{route('company.tours',$company->id)}}">{{$company->tours_count}} Tours</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                    {{$companies->links()}}


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
