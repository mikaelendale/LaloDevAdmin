@extends('layouts.master')

@section('title')  Dashboards @endsection


@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Dashboard @endslot
@endcomponent

<div class="row">
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-primary-subtle">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-3">
                            <h5 class="text-primary">Welcome Back !</h5>
                            <p>Lalo Dev Dashboard</p>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="{{ URL::asset('build/images/profile-img.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="avatar-md profile-user-wid mb-4">
                            <img src="{{ isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('build/images/users/avatar-1.jpg') }}" alt="" class="img-thumbnail rounded-circle">
                        </div>
                        <h5 class="font-size-15 text-truncate">{{ Str::ucfirst(Auth::user()->name) }}</h5>
                        <p class="text-muted mb-0 text-truncate">CEO and Foounder Of Lalo Dev</p>
                    </div>

                    <div class="col-sm-8">
                        <div class="pt-4">

                            <div class="row">
                                <div class="col-6">
                                    <h5 class="font-size-15">5</h5>
                                    <p class="text-muted mb-0"> companies</p>
                                </div>
                                <div class="col-6">
                                    <h5 class="font-size-15">23,011.44 Br</h5>
                                    <p class="text-muted mb-0">Revenue</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         
    </div>
    <div class="col-lg-8 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div>
                        <h4 class="card-title mb-3">Invite your friends to Skote</h4>
                        <p class="text-muted">Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally.</p>
                        <div>
                            <a href="javascript:void(0);" class="btn btn-primary btn-sm"><i class='bx bx-user-plus align-middle'></i> Invite Friends</a>
                        </div>
                    </div>
                    <div>
                        <img src="{{URL::asset('build/images/jobs.png')}}" alt="" height="130">
                    </div>
                </div>
            </div>
        </div> 
        <!--end card-->
    </div> 
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Top Cities Selling Product</h4>

                <div class="text-center">
                    <div class="mb-4">
                        <i class="bx bx-map-pin text-primary display-4"></i>
                    </div>
                    <h3>1,456</h3>
                    <p>San Francisco</p>
                </div>

                <div class="table-responsive mt-4">
                    <table class="table align-middle table-nowrap">
                        <tbody>
                            <tr>
                                <td style="width: 30%">
                                    <p class="mb-0">San Francisco</p>
                                </td>
                                <td style="width: 25%">
                                    <h5 class="mb-0">1,456</h5>
                                </td>
                                <td>
                                    <div class="progress bg-transparent progress-sm">
                                        <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 94%" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="mb-0">Los Angeles</p>
                                </td>
                                <td>
                                    <h5 class="mb-0">1,123</h5>
                                </td>
                                <td>
                                    <div class="progress bg-transparent progress-sm">
                                        <div class="progress-bar bg-success rounded" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="mb-0">San Diego</p>
                                </td>
                                <td>
                                    <h5 class="mb-0">1,026</h5>
                                </td>
                                <td>
                                    <div class="progress bg-transparent progress-sm">
                                        <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
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
<!-- end row --> 


@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- dashboard init -->
<script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
@endsection