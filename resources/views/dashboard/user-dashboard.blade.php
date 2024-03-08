@extends('dashboard.layouts.app')

@section('contents')
    <!--**********************************
                Content body start
            ***********************************-->
    <div class="content-body">
        <!-- row -->
        <!-- row -->
        <div class="container-fluid">
            <div class="form-head d-md-flex mb-sm-4 mb-3 align-items-start">
                <div class="mr-auto  d-lg-block">
                    <h2 class="text-black font-w600">Dashboard</h2>
                    <p class="mb-0">Welcome to Omah Property Admin</p>
                </div>
                <a href="javascript:void(0);" class="btn btn-primary rounded light mr-3">Refresh</a>
                <a href="javascript:void(0);" class="btn btn-primary rounded"><i class="flaticon-381-settings-2 mr-0"></i></a>
            </div>
            <div class="row">
                <div class="col-xl-6 col-xxl-12">
                    <div class="row">

                        <div class="col-sm-12 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body mr-3">
                                            <h2 class="fs-36 text-black font-w600">2,356</h2>
                                            <p class="fs-18 mb-0 text-black font-w500">Completed Order Items</p>

                                        </div>
                                        <div class="d-inline-block position-relative">
                                            <a href="" class="btn btn-primary btn-sm">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body mr-3">
                                            <h2 class="fs-36 text-black font-w600">2,356</h2>
                                            <p class="fs-18 mb-0 text-black font-w500">Pending Order Items</p>

                                        </div>
                                        <div class="d-inline-block position-relative">
                                            <a href="" class="btn btn-primary btn-sm">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body mr-3">
                                            <h2 class="fs-36 text-black font-w600">2,206</h2>
                                            <p class="fs-18 mb-0 text-black font-w500">Wishlist Items</p>

                                        </div>
                                        <div class="d-inline-block position-relative">
                                            <a href="" class="btn btn-primary btn-sm">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Recent Payments Queue</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-responsive-md">
                                            <thead>
                                                <tr>
                                                    <th class="width80"><strong>#</strong></th>
                                                    <th><strong>PATIENT</strong></th>
                                                    <th><strong>DR NAME</strong></th>
                                                    <th><strong>DATE</strong></th>
                                                    <th><strong>STATUS</strong></th>
                                                    <th><strong>PRICE</strong></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><strong>01</strong></td>
                                                    <td>Mr. Bobby</td>
                                                    <td>Dr. Jackson</td>
                                                    <td>01 August 2020</td>
                                                    <td><span class="badge light badge-success">Successful</span></td>
                                                    <td>$21.56</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-success light sharp"
                                                                data-toggle="dropdown">
                                                                <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <circle fill="#000000" cx="5" cy="12" r="2" />
                                                                        <circle fill="#000000" cx="12" cy="12" r="2" />
                                                                        <circle fill="#000000" cx="19" cy="12" r="2" />
                                                                    </g>
                                                                </svg>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">Edit</a>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>02</strong></td>
                                                    <td>Mr. Bobby</td>
                                                    <td>Dr. Jackson</td>
                                                    <td>01 August 2020</td>
                                                    <td><span class="badge light badge-danger">Canceled</span></td>
                                                    <td>$21.56</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-danger light sharp"
                                                                data-toggle="dropdown">
                                                                <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <circle fill="#000000" cx="5" cy="12" r="2" />
                                                                        <circle fill="#000000" cx="12" cy="12" r="2" />
                                                                        <circle fill="#000000" cx="19" cy="12" r="2" />
                                                                    </g>
                                                                </svg>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">Edit</a>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>03</strong></td>
                                                    <td>Mr. Bobby</td>
                                                    <td>Dr. Jackson</td>
                                                    <td>01 August 2020</td>
                                                    <td><span class="badge light badge-warning">Pending</span></td>
                                                    <td>$21.56</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-warning light sharp"
                                                                data-toggle="dropdown">
                                                                <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <circle fill="#000000" cx="5" cy="12" r="2" />
                                                                        <circle fill="#000000" cx="12" cy="12" r="2" />
                                                                        <circle fill="#000000" cx="19" cy="12" r="2" />
                                                                    </g>
                                                                </svg>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">Edit</a>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!--**********************************
                Content body end
            ***********************************-->
@endsection
